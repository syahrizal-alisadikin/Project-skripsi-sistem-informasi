<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Includes;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function detail(Request $request, $slug)
    {
        $kelas = Kelas::where('slug', $slug)->firstOrFail();
        // dd($termasuk);
        return view('pages.user.detail',[
            'kelas' => $kelas,
            // 'termasuk' => $termasuk
        ]);
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
