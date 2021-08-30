<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Peserta;
use App\Transaction;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $peserta = Transaction::with('peserta')->where('status','accept')->get();
        return view('pages.admin.peserta.index',compact('peserta'));
    }
}
