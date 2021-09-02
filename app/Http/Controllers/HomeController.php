<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kelas = Kelas::take(2)->get();
        return view('pages.user.home',[
            'kelas' => $kelas
        ]);
    }
}
