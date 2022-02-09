<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripayCallbackController extends Controller
{
    //
    protected $privateKey = '1kR8l-lToOh-d0t0b-tcTdn-Wg5wG';

    public function handle(Request $request)
    {
        // dd($request);
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return 'Invalid signature';
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return 'Invalid callback event, no action was taken';
        }

        $data = json_decode($json);
        $reference = $data->reference;

        $invoice = DB::table('tb_transaksi_pelanggan')->where('reference', $reference)
            // ->where('status', 'UNPAID')
            ->first();

            // dd($invoice);

        if (! $invoice) {
            return 'Invoice not found or current status is not UNPAID';
        }

        if ((int) $data->total_amount !== (int) $invoice->amount) {
            return 'Invalid amount';
        }

        switch ($data->status) {
            case 'PAID':
                $success = DB::table('tb_transaksi_pelanggan')->where('reference', $reference)->update(['status' => 'PAID']);
                if ($success) {
                    # code...
                    $datax = DB::table('tb_transaksi_pelanggan')
                    ->join('tb_produk_pelanggan', 'tb_transaksi_pelanggan.id_produk_pelanggan', 'tb_produk_pelanggan.id')
                    ->where('reference', $reference)->first();
                    // dd($datax->durasi);
                    if ($datax != NULL) {
                        $date = Carbon::now();
                        $check = DB::table('transaksi_langganan')->where('id_customer', $datax->id_customer)->first();
                        // dd($datax->durasi);
                        if ($check) {
                            $date_db = Carbon::parse($check->akhir_langganan);
                            DB::table('transaksi_langganan')->where('id_customer', $datax->id_customer)->update([
                                'id_produk' => $datax->id_produk_pelanggan,
                                'mulai_langganan' => $date,
                                'akhir_langganan' => $date_db->addDays($datax->durasi),
                                'status_langganan' => 'langganan'
                            ]);
                            return response()->json(['success' => true, 'msg' => 'DB Langganan True']);
                        }
                        return response()->json(['success' => true, 'msg' => 'DB Langganan Check']);
                    }
                    return response()->json(['success' => true]);
                    // DB::table('transaksi_pelanggan')->where()
                }

            case 'EXPIRED':
                DB::table('tb_transaksi_pelanggan')->where('reference', $reference)->update(['status' => 'EXPIRED']);
                return response()->json(['success' => true]);

            case 'FAILED':
                DB::table('tb_transaksi_pelanggan')->where('reference', $reference)->update(['status' => 'FAILED']);
                return response()->json(['success' => true]);

            default:
                return 'Unrecognized payment status';
        }
    }
    
}
