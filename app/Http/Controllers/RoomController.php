<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Order;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::orderBy('floor_number', 'ASC')->get();
        return view('admin.room.index', compact(['rooms']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->cannot('create', Room::class)){
            return redirect('admin/room')->with('error', 'Bạn không đủ thẩm quyền');
        }

        return view('admin.room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room = new Room;
        $room->name = $request->name;
        $room->description = $request->description;
        $room->floor_number = $request->floor_number;
        $room->price_weekday = floatval(str_replace('.', '', strval($request->price_weekday)));
        $room->price_weekend = floatval(str_replace('.', '', strval($request->price_weekend)));
        $room->save();

        return redirect('admin/room')->with('status', 'Tạo phòng thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $room = Room::findOrFail($id);
        return view('admin.room.detail', compact(['room']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $room = Room::findOrFail($id);

        if(auth()->user()->cannot('update', $room)){
            return redirect('admin/room')->with('error', 'Bạn không đủ thẩm quyền');
        }

        return view('admin.room.edit', compact(['room']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $room = Room::findOrFail($id);
        $room->name = $request->name;
        $room->description = $request->description;
        $room->floor_number = $request->floor_number;
        $room->price_weekday = floatval(str_replace('.', '', strval($request->price_weekday)));
        $room->price_weekend = floatval(str_replace('.', '', strval($request->price_weekend)));
        $room->save();

        return redirect('admin/room')->with('status', 'Sửa phòng thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $room = Room::findOrFail($id);

        if(auth()->user()->cannot('forceDelete', $room)){
            return redirect('admin/room')->with('error', 'Bạn không đủ thẩm quyền');
        }

        $orders = Order::orderBy('id', 'ASC')->get();
        $is_room = false;
        foreach($orders as $order)
        {
            if($order->room_id == $room->id)
            {
                $is_room = true;
                break;
            }
        }

        if($is_room)
        {
            return redirect('/admin/room')->with('error', 'Không được xóa phòng đã có đơn hàng');
        }

        $room->delete();

        return redirect('/admin/room')->with('status', 'Xóa phòng thành công');
    }
}
