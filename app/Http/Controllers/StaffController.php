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
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function __construct(ImageService $imageService)
    {
        $this->middleware('staffMiddleware');
        $this->imageService = $imageService;
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
            //Get data from request
            $staff->fill($request->all());

            // Convert birthday format
            $staff->birthday = Carbon::createFromFormat('d/m/Y', $request->birthday);
    
            //Handle image avatar
            if ($request->hasFile('avatar')) {
                $avatarPath = $this->imageService->saveImageAvatar($request->file('avatar'), 'staffs', $staff->name);
                $staff->avatar = $avatarPath;
            }

            //Save staff to database
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
            //Find staff by id
            $staff = Staff::findOrFail($id);

            //Get data from request
            $staff->fill($request->except('birthday'));

            // Convert birthday format
            $staff->birthday = Carbon::createFromFormat('d/m/Y', $request->birthday);
    
            //Handle image avatar
            if ($request->hasFile('avatar')) {
                if($staff->avatar) {
                    $this->imageService->deleteImage($staff->avatar);
                }
                $staff->avatar = $this->imageService->saveImageAvatar($request->file('avatar'), 'staffs', $staff->name);
            }

            //Save staff to database
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
        //Find staff by id
        $staff = Staff::findOrFail($id);

        //Do not delete Admin
        if($staff->Position->name == 'chủ cơ sở')
        {
            return redirect('/admin/staff')->with('error', 'Không được phép xóa chủ cơ sở');
        }

        //Do not delete your account
        if($staff->id == auth()->user()->id)
        {
            return redirect('/admin/staff')->with('error', 'Bạn không thể xóa chính bạn');
        }

        //Delete avatar
        if($staff->avatar) {
            $this->imageService->deleteImage($staff->avatar);
        }

        //Delete user account associated with staff
        $user_id = $staff->User->id;
        if($user_id) {
            $user = User::findOrFail($user_id);
            $user->delete();
        }

        //Delete staff
        $staff->delete();

        return redirect('/admin/staff')->with('status', 'Xóa nhân viên thành công');
    }
}
