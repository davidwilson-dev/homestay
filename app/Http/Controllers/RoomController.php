<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::orderBy('id', 'ASC')->get();
        return view('admin.room.index', compact(['rooms']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        $room->price_weekday = intval(str_replace('.', '', strval($request->price_weekday)));
        $room->price_weekend = intval(str_replace('.', '', strval($request->price_weekend)));
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
        $room->price_weekday = intval(str_replace('.', '', strval($request->price_weekday)));
        $room->price_weekend = intval(str_replace('.', '', strval($request->price_weekend)));
        $room->save();

        return redirect('admin/room')->with('status', 'Sửa phòng thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect('/admin/room')->with('status', 'Xóa phòng thành công');
    }
}
