<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TripayController extends Controller
{
    //

    public function indexBayar($id_produk)
    {
        $apiKey = 'DEV-1ERnMjVEXkW25gdF54k8kaIfkUuvQHx19KqLetGH';

        $payload = [];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_FRESH_CONNECT  => true,
        CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/merchant/payment-channel?'.http_build_query($payload),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER         => false,
        CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
        CURLOPT_FAILONERROR    => false
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        $data = json_decode($response);

        $channel = $data->data;
        // dd($data->data);

        $produk = DB::table('tb_produk_pelanggan')
        ->where('id', $id_produk)
        ->first();

        // dd($produk->harga);

        if ($error == NULL) {
            return view('customer.harga.bayar', compact(['channel', 'produk']));
        }else{
            return view('customer.harga.bayar', compact(['channel', 'produk']));
        }


        echo empty($error) ? $response : $error;
    }


    public function AmbilKodeTransaksi(Request $request)
    {
        // dd(Auth::user()->id_customer);

        $user = DB::table('users')
        ->join('tb_customer', 'users.id_customer', 'tb_customer.id')
        ->where('id_customer', $request['id_customer'])
        ->first();

        // dd($user);
        

        if ($user != NULL) {

            $produk = DB::table('tb_produk_pelanggan')->where('id',$request['id_produk'])->first();

            if ($produk != NULL) {
                $apiKey       = 'DEV-1ERnMjVEXkW25gdF54k8kaIfkUuvQHx19KqLetGH';
                $privateKey   = '1kR8l-lToOh-d0t0b-tcTdn-Wg5wG';
                $merchantCode = 'T8584';
                $merchantRef = 'TRX/CS/' . strtoupper(substr(md5(str_shuffle(time())), 0, 7)) . '/' . Carbon::now()->month . '/' . Carbon::now()->year;
                // $merchantRef  = 'TRX1111231230';
                $amount       = $produk->harga;
        
                $data = [
                    'method'         => $request['code'],
                    'merchant_ref'   => $merchantRef,
                    'amount'         => $amount,
                    'customer_name'  => $user->name,
                    'customer_email' => $user->email,
                    // 'customer_phone' => $user->telpon,
                    'customer_phone' => '081283948155',
                    'order_items'    => [
                        [
                            'sku'         => 'PD-Paket'.$produk->id,
                            'name'        => $produk->nama_produk,
                            'price'       => $produk->harga,
                            'quantity'    => 1,
                            'product_url' => 'https://tokokamu.com/product/nama-produk-1',
                            'image_url'   => 'https://tokokamu.com/product/nama-produk-1.jpg',
                        ],
                    ],
                    // return to app url
                    'return_url'   => 'https://8bc1-140-213-9-62.ngrok.io/redirect',
                    'expired_time' => (time() + (24 * 60 * 60)), // 24 jam
                    'signature'    => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
                ];
        
                $curl = curl_init();
        
                curl_setopt_array($curl, [
                    CURLOPT_FRESH_CONNECT  => true,
                    CURLOPT_URL            => 'https://tripay.co.id/api-sandbox/transaction/create',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HEADER         => false,
                    CURLOPT_HTTPHEADER     => ['Authorization: Bearer '.$apiKey],
                    CURLOPT_FAILONERROR    => false,
                    CURLOPT_POST           => true,
                    CURLOPT_POSTFIELDS     => http_build_query($data)
                ]);
        
                $response = curl_exec($curl);
                $error = curl_error($curl);
        
                curl_close($curl);
                $data = json_decode($response);
                
                $transaksi = $data->data;
        
                // dd($transaksi->checkout_url);
                
                if ($data->success == True) {
                    // return 'success';
                    // dd($transaksi->reference);
                    $success  = DB::table('tb_transaksi_pelanggan')->insert([
                        'id_produk_pelanggan' => $produk->id,
                        'id_customer' => $request['id_customer'],
                        'reference' => $transaksi->reference,
                        'merchant_ref' => $transaksi->merchant_ref,
                        'payment_selection_type' => $transaksi->payment_selection_type,
                        'payment_method' => $transaksi->payment_method,
                        'payment_name' => $transaksi->payment_name,
                        'customer_name' => $transaksi->customer_name,
                        'customer_email' => $transaksi->customer_email,
                        'customer_phone' => $transaksi->customer_phone,
                        'callback_url' => $transaksi->callback_url,
                        'return_url' => $transaksi->return_url,
                        'amount' => $transaksi->amount,
                        'fee_merchant' => $transaksi->fee_merchant,
                        'fee_customer' => $transaksi->fee_customer,
                        'total_fee' => $transaksi->total_fee,
                        'amount_received' => $transaksi->amount_received,
                        'pay_code' => $transaksi->pay_code,
                        'pay_url' => $transaksi->pay_url,
                        'checkout_url' => $transaksi->checkout_url,
                        'status' => $transaksi->status,
                        'expired_time' => $transaksi->expired_time,
                        'qr_string' => null,
                        'qr_url' => null,
                        // 'created_at'
                    ]);
        
                    if ($success) {
                        # code...
                        // return $transaksi->checkout_url;
                        $url = $transaksi->checkout_url;
        
                        // return redirect()->url
                        // return view('customer.redirect',compact(['url']));
                        // return view('customer.redirect',compact(['url']));
                        // return redirect('redirect')->with('message', $url);
                        return response()->json($url);
                    }else{
                        return "Gagal Nih";
                    }
                }else{
                    return $error;
                    // dd('Invalid Api Key');
                }
            }else{
                return response()->json(['code'=>404,'message'=>'Produk Not Found']);
            }
        }else{
            return response()->json(['code'=>404,'message'=>'User Not Found']);
        }
    }

    // public function Callback_Status(Request $request)
    // {

    // }

}
