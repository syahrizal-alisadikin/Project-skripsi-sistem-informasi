<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Includes;
use App\Materi;
use App\Transaction;
use App\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function detail(Request $request, $slug)
    {
        $kelas = Kelas::where('slug', $slug)->with('instruktur')->firstOrFail();
        // dd($kelas);
        $materies = Materi::all();
        $includes = Includes::all();
        return view('pages.user.detail',[
            'kelas' => $kelas,
            'includes' => $includes,
            'materies' => $materies
        ]);
    }
    public function payment(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);

        $data = $request->all();

        return view('pages.user.payment', [
            'kelas' => $kelas,
            'data' => $data
        ]);
    }
    public function kelas(Request $request)
    {
        $peserta = Peserta::where('user_id', Auth::user()->id)->with([
            'kelas','transaction'
        ])->get();
        return view('pages.user.kelas', [
            'peserta' => $peserta
        ]);
    }
    public function detailPay(Request $request, $id)
    {
        
    }
    public function checkout(Request $request)
    {
        // dd($request->all());
        $peserta = Peserta::create([
            'user_id' => Auth::user()->id,
            'kelas_id' => $request->kelas_id,
            'durasi' => $request->durasi,
            'kedatangan' => $request->kedatangan
        ]);
        $transaction = Transaction::create([
            'peserta_id' => $peserta->id,
            'status' => 'pending',
            'total_harga' => $request->total_harga
        ]);
        
        return redirect()->route('class')->with('success', 'Kelas Berhasil Di Tambahkan');
    }
}
