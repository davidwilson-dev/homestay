<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Role;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Facility;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Services\ImageService;
use App\Services\EmployeeRoleService;

use App\Jobs\CreateUserJob;

class UserController extends Controller
{
    public function __construct(ImageService $imageService)
    {
        $this->middleware('preventDoubleSubmit')->only(['store', 'update']);
        $this->imageService = $imageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('status', 'active')
            ->whereDoesntHave('roles', function ($q) {
                $q->whereIn('name', ['admin', 'owner']);
            })
            ->orderBy('id', 'ASC')
            ->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $facilities = Facility::get();

        return view('admin.user.create', compact(['facilities']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request, EmployeeRoleService $employeeRoleService)
    {
        DB::beginTransaction();

        try {
            // ========== Handle User ========== //

            // Create new User
            $user = new User;   

            // Create password
            $password = Str::random(8);
            $user->password = Hash::make($password);

            // Get data User from request
            $user->email = $request->email;

            // Handle username
            $user->username = Str::slug(Str::before($user->email, '@'));

            // Save User
            $user->save();

            // ========== Handle Employee ========== //

            // Create new Employee
            $employee = new Employee;

            // Get data Employee from request
            $employee->fill($request->all());

            // Handle user_id
            $employee->user_id = $user->id;
            
            // Handle code employee
            $counter = DB::table('code_employee_counter')->lockForUpdate()->first();
            $number;
            if(! $counter)
            {
                $number = 1;
                DB::table('code_employee_counter')->insert([
                    'last_number' => $number,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            else
            {
                $number = $counter->last_number + 1;
                DB::table('code_employee_counter')
                    ->where('id', $counter->id)
                    ->update([
                        'last_number' => $number,
                        'updated_at' => now(),
                ]);
            }           
            $employee->code = str_pad($number, 4, '0', STR_PAD_LEFT);

            // Handle avatar
            if ($request->hasFile('avatar')) {
                $avatarPath = $this->imageService->saveImageAvatar($request->file('avatar'), 'employees', $employee->name);
                $employee->avatar = $avatarPath;
            }

            // Save Employee
            $employee->save();

            // ========== Handle Role ========== //
            $position = $request->input('position');
            $employeeRoleService->syncUserRolesByPosition($user, $position);


            // ========== Send mail verify ========== // 
            CreateUserJob::dispatch($user->id, $password);

            DB::commit();
            return redirect('/admin/user')->with('status', 'Tạo tài khoản thành công');
        }
        catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Transaction failed: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::whereNotIn('name', ['admin', 'owner'])->get();
        $rolesUser = $user->roles->pluck('id')->toArray();
        $facilities = Facility::get();
        return view('/admin/user/detail', [
            'user' => $user, 
            'roles' => $roles,
            'facilities' => $facilities,
            'rolesUser' => $rolesUser
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::whereNotIn('name', ['admin', 'owner'])->get();
        $rolesUser = $user->roles->pluck('id')->toArray();
        $facilities = Facility::get();
        return view('/admin/user/edit', [
            'user' => $user, 
            'roles' => $roles,
            'facilities' => $facilities,
            'rolesUser' => $rolesUser
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id, EmployeeRoleService $employeeRoleService)
    {
        DB::beginTransaction();

        try{
            // ========== Handle User ========== //

            // Find User by id
            $user = User::findOrFail($id);
    
            // Get data User from request
            $user->email = $request->email;
    
            // Handle username
            $user->username = Str::slug(Str::before($user->email, '@'));
    
            // Save User
            $user->save();

    
            // ========== Handle Employee ========== //

            // Find Employee by user_id
            $employee = $user->employee; // $employee = Employee::where('user_id', $user->id)->first();

            // Get data from request
            $employee->fill($request->all());

            // Handle avatar
            if ($request->hasFile('avatar')) {
                if ($employee->avatar) {
                    $this->imageService->deleteImage($employee->avatar);
                }
                $avatarPath = $this->imageService->saveImageAvatar($request->file('avatar'), 'employees', $employee->name);
                $employee->avatar = $avatarPath;
            }

            // Save Employee
            $employee->save();

            // ========== Handle Role ========== //
            $position = $request->input('position');
            $employeeRoleService->syncUserRolesByPosition($user, $position);

            DB::commit();
            return redirect('/admin/user')->with('status', 'Cập nhật tài khoản thành công');
        }
        catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Transaction failed: ' . $e->getMessage());
        }
    }

    /**
     * Soft delete, trash, restore User
     */

    public function delete($id)
    {

        $user = User::findOrFail($id);
        $user->delete();
        return redirect('admin/user')->with('status', 'Xóa người dùng thành công');
    }

    public function trash()
    {
        $users = User::onlyTrashed()->orderBy('id', 'ASC')->get();
        return view('admin.user.trash', compact(['users']));
    }

    public function restore($id)
    {
        User::withTrashed()->findOrFail($id)->restore();
        return redirect('admin/user/trash')->with('status', 'Khôi phục tài khoản thành công');
    }

    public function force($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect('admin/user/trash')->with('status', 'Xóa vĩnh viễn tài khoản thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }

    public function locked()
    {
        $users = User::where('status', 'inactive')->orderBy('id', 'ASC')->get();
        $list_name = 'tạm khóa';
        return view('admin.user.index', compact(['users', 'list_name']));
    }
}
