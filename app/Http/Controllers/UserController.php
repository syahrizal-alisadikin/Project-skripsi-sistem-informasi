<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Includes;
use App\Materi;
use App\Transaction;
use App\Peserta;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(Request $request)
    {
        

        $this->request = $request;
        // Set midtrans configuration
        \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');
    } 

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
         $peserta = Peserta::with([
            'kelas','transaction'
        ])->findOrFail($id);
        return view('pages.user.detailPayment',compact('peserta'));
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
        // Buat transaksi ke midtrans kemudian save snap tokennya.
            $payload = [
                'transaction_details' => [
                    'order_id'      => $transaction->id,
                    'gross_amount'  => $transaction->total_harga,
                ],
                'customer_details' => [
                    'first_name'       => Auth::user()->name,
                    'email'            => Auth::user()->email,
                    'phone'            => Auth::user()->phone,
                ],
                'enabled_payments' => array('gopay','bank_transfer'),
                'vtweb' => array()
            ];

            try {
            // Ambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($payload)->redirect_url;
            
            $transaction->snap_token = $paymentUrl;
            $transaction->save();
            
            // Redirect ke halaman midtrans
            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
        // return redirect()->route('class')->with('success', 'Kelas Berhasil Di Tambahkan');
    }

    public function callback(Request $request)
    {
        // Set konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Buat instance midtrans notification
        $notification = new Notification();

        // Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Cari transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($order_id);

        // Handle notification status midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $transaction->status = 'PENDING';
                }
                else {
                    $transaction->status = 'SUCCESS';
                }
            }
        }
        else if ($status == 'settlement'){
            $transaction->status = 'SUCCESS';
        }
        else if($status == 'pending'){
            $transaction->status = 'PENDING';
        }
        else if ($status == 'deny') {
            $transaction->status = 'CANCELLED';
        }
        else if ($status == 'expire') {
            $transaction->status = 'CANCELLED';
        }
        else if ($status == 'cancel') {
            $transaction->status = 'CANCELLED';
        }

        // Simpan transaksi
        $transaction->save();

        // Kirimkan email
        if ($transaction)
        {
            if($status == 'capture' && $fraud == 'accept' )
            {
                //
            }
            else if ($status == 'settlement')
            {
                //
            }
            else if ($status == 'success')
            {
                //
            }
            else if($status == 'capture' && $fraud == 'challenge' )
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Challenge'
                    ]
                ]);
            }
            else
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment not Settlement'
                    ]
                ]);
            }

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Notification Success'
                ]
            ]);
        }
    }
    
}
