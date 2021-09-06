<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('peserta')->get();
        return view('pages.admin.transaction.index',compact('transactions'));
    }

    public function edit($id)
    {
        $transaction = Transaction::with('peserta')->findOrFail($id);
        return view('pages.admin.transaction.edit',compact('transaction'));
    }

    public function update(Request $request,$id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update([
            'total_harga' => $request->total_harga,
            'status' => $request->status,
        ]);
        return redirect()->route('transaction.index')->with('success','data berhasil diupdate');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

         if($transaction){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
