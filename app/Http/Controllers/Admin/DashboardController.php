<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        //count invoice
        $pending = Transaction::where('status', 'PENDING')->count();
        $success = Transaction::where('status', 'SUCCESS')->count();
        $expired = Transaction::where('status', 'CANCELLED')->count();

        //year and month
        $year   = date('Y');
        $month  = date('m');
		
        //statistic revenue
        $revenueMonth = Transaction::where('status', 'SUCCESS')->whereMonth('created_at', '=', $month)->whereYear('created_at', $year)->sum('total_harga');
        $revenueYear  = Transaction::where('status', 'SUCCESS')->whereYear('created_at', $year)->sum('total_harga');
        $revenueAll   = Transaction::where('status', 'SUCCESS')->sum('total_harga');
        return view ('pages.admin.dashboard',compact('pending', 'success', 'expired', 'revenueMonth', 'revenueYear', 'revenueAll'));
    }
}
