<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index');
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
                $new_image = $name_image . Str::random(10) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move($path,$new_image);
                $user->avatar = $new_image;
            }
    
            //1. Save User
            $user->save();
    
            //2. Send mail
            SendMailCreateUserJob::dispatch($user->id);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
