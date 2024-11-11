<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use Illuminate\Http\Request;
use Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->get();
        return view('admin.user.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::orderBy('id', 'ASC')->get();
        return view('admin.user.create', compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        DB::beginTransaction();

        try {
            $user = new User;
            $user->fill($request->except('password'));
        
            //Hash password
            $user->password = Hash::make($request->password);

            //Token
            $user->remember_token = Str::random(20);
    
            //Add new Image 
            $get_image = $request->avatar;
    
            if($get_image)
            {
                $path = 'frontend/admin/images/users/';
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = Str::slug($name_image, '-') . Str::random(10) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move($path,$new_image);
                $user->avatar = $new_image;
            }
    
            //1. Save User
            $user->save();
    
            //2. Send mail
            // SendMailCreateUserJob::dispatch($user->id);

            DB::commit();
        }
        catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Transaction failed: ' . $e->getMessage());
        }

        return redirect('/admin/user')->with('status', 'Tạo tài khoản thành công');
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
        if($request->password && $request->password !== $request->password_confirmation)
        {
            return redirect()->back()->with('error', 'Xác nhận mật khẩu không khớp');
        }

        //Hash password
        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }

        //Update new Image 
        $get_image = $request->avatar;

        if($get_image)
        {
            //Delete old Image
            $path_unlink = 'frontend/admin/images/users/'.$user->avatar;

            if(file_exists($path_unlink) && $path_unlink !== 'frontend/admin/images/users/')
            {
                unlink($path_unlink);
            }
             
            //Add Image
            $path = 'frontend/admin/images/users/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = Str::slug($name_image, '-') . '-' . Str::random(10).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $user->avatar = $new_image;
        }

        $user->save();

        return redirect('/admin/user')->with('status', 'Cập nhật tài khoản thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        //Do not delete User Admin
        if($user->Role->name == 'Admin')
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
}
