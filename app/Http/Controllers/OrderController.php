<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use Illuminate\Http\Request;
use Str;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        return view('admin.order.index', compact(['orders']));
    }

    public function index_booked()
    {
        $orders = Order::orderBy('created_at', 'ASC')->where('status', 'booked')->get();
        return view('admin.order.index_booked', compact(['orders']));
    }

    public function index_checkin()
    {
        $orders = Order::orderBy('created_at', 'ASC')->where('status', 'checkin')->where('checkout', null)->get();
        return view('admin.order.index_checkin', compact(['orders']));
    }

    public function index_checkout()
    {
        $orders = Order::orderBy('created_at', 'ASC')->where('status', 'checkout')->get();
        return view('admin.order.index_checkout', compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::orderBy('id', 'ASC')->get();
        return view('admin.order.create', compact(['rooms']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->fill($request->except(['deposit', 'discount']));

        $room = Room::findOrFail($request->room_id);
        $order->order_code = Str::slug($room->name, '-') . '-' . Str::slug(Carbon::now(), '-');

        $order->deposit = intval(str_replace('.', '', strval($request->deposit)));
        $order->discount = intval(str_replace('.', '', strval($request->discount)));

        $order->save();

        return redirect('admin/order')->with('status', 'Tạo đơn hàng thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $order = Order::findOrFail($id);
        $rooms = Room::orderBy('id', 'ASC')->get();
        return view('admin.order.detail', compact(['order', 'rooms']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $order = Order::findOrFail($id);
        $rooms = Room::orderBy('id', 'ASC')->get();
        return view('admin.order.edit', compact(['order', 'rooms']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $order = Order::findOrFail($id);

        if($order->status == 'booked')
        {
            $order->status = 'checkin';
            $order->checkin = Carbon::now('Asia/Ho_Chi_Minh');
    
            $order->save();
            return redirect('admin/order-checkin');
        }

        if($order->status == 'checkin')
        {
            $order->status = 'checkout';
            $order->checkout = Carbon::now('Asia/Ho_Chi_Minh');
    
            $order->save();
            return redirect('admin/order-checkout');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect('admin/order-booked')->with('status', 'Xóa đơn hàng thành công');
    }
}
