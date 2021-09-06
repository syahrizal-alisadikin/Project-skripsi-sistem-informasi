<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Kelas;
use App\Peserta;
use App\Transaction;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $peserta = Transaction::with('peserta.user')->where('status','SUCCESS')->get();
        // dd($peserta);
        return view('pages.admin.peserta.index',compact('peserta'));
    }

    public function edit($id)
    {
        $peserta = Transaction::with('peserta.user')->findOrFail($id);
        $kelas = Kelas::all();
        return view('pages.admin.peserta.edit',compact('peserta','kelas'));
    }

    public function update(Request $request,$id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->update([
            'kelas' => $request->kelas,
            'durasi' => $request->durasi,
        ]);

        return redirect()->route('peserta.index')->with('success','data berhasil diupdate');

    }
}
