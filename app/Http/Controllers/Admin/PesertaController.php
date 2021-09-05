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
        $peserta = Transaction::with('peserta.user')->where('status','accept')->get();
        // dd($peserta);
        return view('pages.admin.peserta.index',compact('peserta'));
    }

    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('pages.admin.peserta.edit',compact('peserta'));
    }
}
