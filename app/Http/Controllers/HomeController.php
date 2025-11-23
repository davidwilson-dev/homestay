<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Booking;
use App\Models\User;

use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_order = Booking::count() ?: 0;
        $count_user = User::count() ?: 0;
        $count_staff= Staff::count() ?: 0;     

        $staffs = Staff::orderBy('id', 'DESC')->where('position_id', 4)->take(5)->get();
        $orders = Booking::orderBy('id', 'DESC')->take(5)->get();

        foreach($orders as $order)
        {
            $checkin = Carbon::parse($order->checkin);
            $order->checkin = $checkin->format('d/m/Y');
        }

        $time_now = Carbon::now('Asia/Ho_Chi_Minh');

        return view
        (
            'admin.dashboard', 
            compact
            (
                [
                    'staffs', 
                    'orders',
                    'count_order',
                    'count_user',
                    'count_staff',
                    'time_now'
                ]
            )
        );
    }
}
