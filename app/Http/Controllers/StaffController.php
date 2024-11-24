<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use Illuminate\Support\Facades\DB;
use Str;
use Carbon\Carbon;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('staffMiddleware');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staffs = Staff::orderBy('position_id', 'ASC')->get();
        $positions = Position::orderBy('id', 'ASC')->get();
        return view('admin.staff.index', compact(['positions', 'staffs']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Position::orderBy('id', 'ASC')->get();
        return view('admin.staff.create', compact(['positions']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStaffRequest $request)
    {
        DB::beginTransaction();

        try {
            $staff = new Staff;
            $staff->fill($request->except('birthday'));
            $staff->birthday = Carbon::createFromFormat('m/d/Y', $request->birthday);
    
            //Add new Image 
            $get_image = $request->avatar;
    
            if($get_image)
            {
                $path = 'frontend/admin/images/staffs/';
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = Str::slug($name_image, '-') . Str::random(10) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move($path,$new_image);
                $staff->avatar = $new_image;
            }

            $staff->save();

            DB::commit();
        }
        catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Transaction failed: ' . $e->getMessage());
        }

        return redirect('/admin/staff')->with('status', 'Tạo nhân viên thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staff.detail', compact(['staff']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $staff = Staff::findOrFail($id);
        $positions = Position::orderBy('id', 'ASC')->get();
        return view('admin.staff.edit', compact(['staff', 'positions']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffRequest $request, String $id)
    {
        DB::beginTransaction();

        try {
            $staff = Staff::findOrFail($id);
            $staff->fill($request->except('birthday'));
            $staff->birthday = Carbon::createFromFormat('m/d/Y', $request->birthday);
    
            //Update avatar 
            $get_image = $request->avatar;
    
            if($get_image)
            {
                //Delete old avatar
                $path_unlink = 'frontend/admin/images/staffs/'.$staff->avatar;

                if(file_exists($path_unlink) && $path_unlink !== 'frontend/admin/images/staffs/')
                {
                    unlink($path_unlink);
                }

                //Add new avatar
                $path = 'frontend/admin/images/staffs/';
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = Str::slug($name_image, '-') . Str::random(10) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move($path,$new_image);
                $staff->avatar = $new_image;
            }

            $staff->save();

            DB::commit();
        }
        catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Transaction failed: ' . $e->getMessage());
        }

        return redirect('/admin/staff')->with('status', 'Tạo nhân viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $staff = Staff::findOrFail($id);

        //Do not delete Admin
        if($staff->Position->name == 'giám đốc')
        {
            return redirect('/admin/staff')->with('error', 'Không được phép xóa giám đốc');
        }

        //Do not delete your account
        if($staff->id == auth()->user()->id)
        {
            return redirect('/admin/staff')->with('error', 'Bạn không thể xóa chính bạn');
        }

        //Delete avatar
        $path_unlink = 'frontend/admin/images/staffs/'.$staff->avatar;

        if(file_exists($path_unlink) && $path_unlink !== 'frontend/admin/images/staffs/')
        {
            unlink($path_unlink);
        }

        //Delete user account Staff
        $user_id = $staff->User->id;
        $user = User::findOrFail($user_id);
        $user->delete();

        $staff->delete();

        return redirect('/admin/staff')->with('status', 'Xóa nhân viên thành công');
    }
}
