<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function detail(Request $request)
    {
        return view('pages.user.detail');
    }
    public function payment(Request $request)
    {
        return view('pages.user.payment');
    }
    public function kelas(Request $request)
    {
        return view('pages.user.kelas');
    }
    public function detailPayment(Request $request)
    {
        return view('pages.user.detailPayment');
    }
}
