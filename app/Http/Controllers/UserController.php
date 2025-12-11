<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Role;
use App\Models\Staff;
use App\Models\Position;
use App\Models\Facility;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Services\ImageService;

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
        $roles = Role::whereNotIn('name', ['admin', 'owner'])->get();
        $positions = Position::get();
        $facilities = Facility::get();

        return view('admin.user.create', compact(['roles', 'positions', 'facilities']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();

        try {
            // Create User
            $user = new User;   

            // Create password
            $password = Str::random(8);
            $user->password = Hash::make($password);

            // Get data User from request
            $user->email = $request->email;
            $user->facility_id = $request->facility_id;

            // Handle username
            $user->username = Str::slug(Str::before($user->email, '@'));

            // Save User
            $user->save();

            // Handle role
            if (! $user->roles->contains($request->role_id)) {
                $user->roles()->attach($request->role_id);
            }

            // Create Staff
            $staff = new Staff;

            // Get data Staff from request
            $staff->fill($request->all());

            // Handle user_id
            $staff->user_id = $user->id;
            
            // Handle code staff
            $counter = DB::table('staff_code_counter')->lockForUpdate()->first();
            $number;
            if(! $counter)
            {
                $number = 1;
                DB::table('staff_code_counter')->insert([
                    'last_number' => $number,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
            else
            {
                $number = $counter->last_number + 1;
                DB::table('staff_code_counter')
                    ->where('id', $counter->id)
                    ->update([
                        'last_number' => $number,
                        'updated_at' => now(),
                ]);
            }
            $staff->code = $number;

            // Handle avatar
            if ($request->hasFile('avatar')) {
                $avatarPath = $this->imageService->saveImageAvatar($request->file('avatar'), 'staffs', $staff->full_name);
                $staff->avatar = $avatarPath;
            }

            // Save Staff
            $staff->save();

            // Hanlde position
            $role = Role::findOrFail($request->role_id);
            $roleName = $role->name;
            $position = Position::where('name', $role->name)->first();
            if (! $staff->positions->contains($position->id)) {
                $staff->positions()->attach($position->id);
            }


            // Send mail verify         
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
        $roles = Role::orderBy('id', 'ASC')->get();
        return view('/admin/user/detail', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::orderBy('id', 'ASC')->get();
        return view('/admin/user/edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->except('password'));

        //Min password
        if($request->password && Str::length($request->password) < 8)
        {
            return redirect()->back()->with('error', 'Mật khẩu tối thiểu phải có 8 ký tự');
        }

        //Confirm password
        if($request->password && $request->password != $request->password_confirmation)
        {
            return redirect()->back()->with('error', 'Xác nhận mật khẩu không khớp');
        }

        //Hash password
        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect('/admin/user')->with('status', 'Cập nhật tài khoản thành công');
    }

    /**
     * Soft delete the specified resource from  storage
     */

    public function delete(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return redirect('admin/user')->with('status', 'Xóa người dùng thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        //Do not delete User Admin
        if($user->Role->name == 'admin')
        {
            return redirect('/admin/user')->with('error', 'Không được phép xóa tài khoản Admin');
        }

        //Delete avatar
        $path_unlink = 'frontend/admin/images/users/'.$user->avatar;

        if(file_exists($path_unlink) && $path_unlink !== 'frontend/admin/images/users/')
        {
            unlink($path_unlink);
        }

        $user->delete();
        return redirect('/admin/user')->with('status', 'Xóa tài khoản thành công');
    }

    /* Custom function */
    public function trash()
    {
        $users = User::onlyTrashed()->orderBy('id', 'ASC')->get();
        $list_name = 'đã xóa';
        return view('admin.user.index', compact(['users', 'list_name']));
    }

    public function locked()
    {
        $users = User::where('status', 'inactive')->orderBy('id', 'ASC')->get();
        $list_name = 'tạm khóa';
        return view('admin.user.index', compact(['users', 'list_name']));
    }
}
