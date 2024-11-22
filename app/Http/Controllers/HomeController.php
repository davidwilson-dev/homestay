<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Order;
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
        $count_order = Order::count();
        $count_user = User::count();
        $count_staff= Staff::count();     

        $staffs = Staff::orderBy('id', 'DESC')->where('position_id', 4)->take(5)->get();
        $orders = Order::orderBy('id', 'DESC')->take(5)->get();

        $time_now = Carbon::now('Asia/Ho_Chi_Minh');

        return view
        (
            'admin.home', 
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
