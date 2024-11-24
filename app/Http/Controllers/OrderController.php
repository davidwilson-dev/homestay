<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use Illuminate\Http\Request;
use Str;
use Carbon\Carbon;
use App\Http\Requests\StoreOrderRequest;

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

        foreach($orders as $order)
        {
            $checkin_estimate = Carbon::parse($order->checkin_estimate);
            $order->checkin_estimate = $checkin_estimate->format('H:i - d/m/Y');

            $checkout_estimate = Carbon::parse($order->checkout_estimate);
            $order->checkout_estimate = $checkout_estimate->format('H:i - d/m/Y');
        }

        return view('admin.order.index_booked', compact(['orders']));
    }

    public function index_checkin()
    {
        $orders = Order::orderBy('created_at', 'ASC')->where('status', 'checkin')->where('checkout', null)->get();

        foreach($orders as $order)
        {
            $checkin = Carbon::parse($order->checkin);
            $order->checkin = $checkin->format('H:i - d/m/Y');

            if($order->checkout_estimate)
            {
                $checkout_estimate = Carbon::parse($order->checkout_estimate);
                $order->checkout_estimate = $checkout_estimate->format('H:i - d/m/Y');
            }
        }

        return view('admin.order.index_checkin', compact(['orders']));
    }

    public function index_checkout()
    {
        $orders = Order::orderBy('created_at', 'ASC')->where('status', 'checkout')->get();

        foreach($orders as $order)
        {
            $checkin = Carbon::parse($order->checkin);
            $order->checkin = $checkin->format('H:i - d/m/Y');

            $checkout = Carbon::parse($order->checkout);
            $order->checkout = $checkout->format('H:i - d/m/Y');
        }

        return view('admin.order.index_checkout', compact(['orders']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->cannot('create', Order::class)){
            return redirect('admin/order')->with('error', 'Bạn không đủ thẩm quyền');
        }

        $rooms = Room::orderBy('id', 'ASC')->get();
        return view('admin.order.create', compact(['rooms']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //Check status checkin checkin_estimate
        if($request->status == 'booked' && !$request->checkin_estimate)
        {
            return redirect()->back()->with('error', 'Đặt phòng phải có thời gian dự kiến nhận phòng');
        }

        if($request->status == 'checkin' && !$request->checkin)
        {
            return redirect()->back()->with('error', 'Phải nhập thời gian nhận phòng');
        }

        //Check room availability

        //Create New Order
        $order = new Order;
        $order->fill($request->except(['deposit', 'discount']));

        $room = Room::findOrFail($request->room_id);
        $order->order_code = Str::slug($room->name, '-') . '-' . Str::slug(Carbon::now(), '-');

        $order->deposit = floatval(str_replace('.', '', strval($request->deposit)));
        $order->discount = floatval(str_replace('.', '', strval($request->discount)));

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

        if(auth()->user()->cannot('create', $order)){
            return redirect('admin/order')->with('error', 'Bạn không đủ thẩm quyền');
        }

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
            if(!$request->order_price)
            {
                return redirect()->back()->with('error', 'Bạn chưa nhập mục đơn giá');
            }

            $order->status = 'checkout';
            $order->checkout = Carbon::now('Asia/Ho_Chi_Minh');
            $order->discount = floatval(str_replace('.', '', strval($request->discount)));
            $order->deposit = floatval(str_replace('.', '', strval($request->deposit)));
            $order->utility_fee = floatval(str_replace('.', '', strval($request->utility_fee)));
            $order->penalty_fee = floatval(str_replace('.', '', strval($request->penalty_fee)));
            $order->order_price = floatval(str_replace('.', '', strval($request->order_price)));
    
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

        if(auth()->user()->cannot('forceDelete', $order)){
            return redirect('admin/order')->with('error', 'Bạn không đủ thẩm quyền');
        }

        if($order->status != 'booked')
        {
            return redirect('admin/order-booked')->with('error', 'Không thể xóa đơn hàng này');
        }

        $order->delete();

        return redirect('admin/order-booked')->with('status', 'Xóa đơn hàng thành công');
    }
}
