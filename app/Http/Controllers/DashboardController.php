<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Booking;
use App\Models\User;
use App\Models\BookingPayment;

use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalBookings = Booking::count();
        $totalUsers = User::count();
        $totalEmployees = Employee::count();
        $totalRevenue = BookingPayment::whereNot('type', 'refund')->where('status', 'succeeded')->sum('amount');

        // $recentCollaborators = Staff::whereHas('position', fn($q) => $q->where('name','collaborator'))
        //     ->orderBy('id', 'DESC')
        //     ->take(5)
        //     ->get();
        $recentCollaborators = collect();
        $recentbookings = Booking::orderBy('id', 'DESC')->take(5)->get();

        $timenow = Carbon::now('Asia/Ho_Chi_Minh');

        return view
        (
            'admin.dashboard', 
            compact
            (
                [
                    'totalBookings',
                    'totalUsers',
                    'totalEmployees',
                    'totalRevenue',
                    'recentCollaborators', 
                    'recentbookings',
                    'timenow'
                ]
            )
        );
    }
}
