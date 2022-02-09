<?php

namespace App\Http\Controllers;

use App\Models\tb_detail_transaksi;
use App\Models\tb_kasir;
use App\Models\tb_produk;
use App\Models\tb_transaksi;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

// DB
// Auth

class KasirController extends Controller
{
    //
    public function index()
    {
        $date  = Carbon::today()->toDateString();
        $data = explode('-', $date);
        $hari_ini = $data[2];
        // dd($data);
        // dd(Auth::user()->id_kasir);

        $pendapatan_today = tb_transaksi::where('id_kasir', Auth::user()->id_kasir)
            ->whereDate('created_at', Carbon::today())->sum('sum_total');

        $pendapatan_thisWeek = tb_transaksi::where('id_kasir', Auth::user()->id_kasir)
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->sum('sum_total');

        $transaksi_today = tb_transaksi::where('id_kasir', Auth::user()->id_kasir)
            ->whereDate('created_at', Carbon::today())
            ->count('id');

        $transaksi_thisWeek = tb_transaksi::where('id_kasir', Auth::user()->id_kasir)
            ->whereBetween('created_at', [Carbon::now()
                ->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count('id');

        $recent_transaksi = tb_transaksi::where('id_kasir', Auth::user()->id_kasir)
            ->orderByDesc('id')
            ->take(5)
            ->get();

        // dd($pendapatan_thisWeek);

        return view('kasir.index', compact(['pendapatan_today', 'pendapatan_thisWeek', 'transaksi_today', 'transaksi_thisWeek', 'recent_transaksi']));
    }

    // transaksi

    public function indexTransaksi()
    {

        $kasir = DB::table('tb_kasir')->where('id', Auth::user()->id_kasir)->get();


        // dd(\Cart::session(auth()->id())->getContent());

        // dd($kasir[0]->id_toko);

        // dd(Auth::user()->id_kasir);

        if ($kasir->isEmpty()) {
            abort(404);
        } else {
            $produk = DB::table('tb_produk')
                ->join('tb_kategori', 'tb_produk.id_kategori', 'tb_kategori.id')
                // ->join('users', 't')
                ->where('tb_produk.id_customer', $kasir[0]->id_customer)
                // ->where('tb_produk.id_toko', $kasir[0]->id_toko)
                ->select('tb_produk.*', 'tb_kategori.nama_kategori')
                ->paginate(4);
                // ->get();

            // dd($produk);
            return view('kasir.transaksi.index', compact(['produk']));
        }
    }

    public function addCart(Request $request)
    {
        // dd(auth()->id());
        $produk = tb_produk::where('id', $request['id'])
            ->firstOrFail();



        if ($produk !== NULL) {

            \Cart::session(auth()->id())->add(array(
                'id' => $produk->id,
                'name' => $produk->nama_produk,
                'price' => $produk->harga,
                'quantity' => 1,
                'attributes' => array(),
                'associatedModel' => $produk
            ));
            return response()->json(['msg' => 'Berhasil menambahkan produk', 200]);
        } else {
            return response()->json(['msg' => 'Produk Tidak Ditemukan', 404]);
        }
        // dd($request['id']);
        // dd($produk);
    }
    public function getCart()
    {
        $data = \Cart::session(auth()->id())->getContent();

        if ($data !== NULL) {
            return response()->json(['msg' => 'Sukses Get Data', 'status' => 200, 'data' => $data]);
        } else {
            return response()->json(['msg' => 'Keranjang masih kosong', 'status' => 404]);
        }
    }

    public function getJumlah()
    {
        $data = \Cart::session(auth()->id())->getSubTotal();

        if ($data !== 0) {
            return response()->json(['msg' => 'Sukses Get Data', 'status' => 200, 'data' => $data]);
        } else {
            return response()->json(['msg' => 'Gagal Get Data, Keranjang kosong', 'status' => 404]);
        }
    }

    public function minesCart(Request $request)
    {
        // dd($request['id']);

        $data = \Cart::session(auth()->id())->get($request['id']);

        $qty = $data->quantity;
        // dd($count);
        if ($data !== NULL) {
            if ($qty >= 0) {

                \Cart::session(auth()->id())->update($request['id'], [
                    'quantity' => -1,
                ]);
                return response()->json(['msg' => 'Berhasil mengurangi keranjan', 'status' => 200]);
            } else {
                return response()->json(['msg' => 'Quantity produk kurang dari 0', 'status' => 404]);
            }
        } else {
            return response()->json(['msg' => 'Data Tidak Ditemukan', 'status' => 404]);
        }
    }
    public function plusCart(Request $request)
    {
        // dd($request['id']);

        $data = \Cart::session(auth()->id())->get($request['id']);

        $qty = $data->quantity;
        // dd($count);
        if ($data !== NULL) {
            if ($qty >= 0) {

                \Cart::session(auth()->id())->update($request['id'], [
                    'quantity' => 1,
                ]);
                return response()->json(['msg' => 'Berhasil mengurangi keranjan', 'status' => 200]);
            } else {
                return response()->json(['msg' => 'Quantity produk kurang dari 0', 'status' => 404]);
            }
        } else {
            return response()->json(['msg' => 'Data Tidak Ditemukan', 'status' => 404]);
        }
    }
    public function deleteCart(Request $request)
    {
        $data = \Cart::session(auth()->id())->get($request['id']);

        if ($data !== NULL) {
            \Cart::session(auth()->id())->remove($request['id']);
            return response()->json(['msg' => 'Berhasil menghapus keranjang', 'status' => '200']);
        } else {
            return response()->json(['msg' => 'Data Tidak Ditemukan', 'status' => 404]);
        }
    }

    public function addTransaksi(Request $request)
    {
        $data = \Cart::session(auth()->id())->getContent();

        $jumlah = \Cart::session(auth()->id())->getSubTotal();

        // dd($request['jumlah']);
        $id_kasir = Auth::user()->id_kasir;
        $data_kasir = tb_kasir::findOrFail($id_kasir)->first();

        if ($data_kasir !== NULL) {
            $id_toko = $data_kasir['id_toko'];

            if (\Cart::isEmpty()) {
                return response()->json(['msg' => 'Keranjang Kamu Kosong', 'status' => 404]);
            } else {
                $no_transaksi = 'TRX/' . strtoupper(substr(md5(str_shuffle(time())), 0, 7)) . '/' . Carbon::now()->month . '/' . Carbon::now()->year;

                $id_transaksi = tb_transaksi::create([
                    'id_kasir' => $id_kasir,
                    'id_toko' => $id_toko,
                    'no_transaksi' => $no_transaksi,
                    'sum_total' => $request['jumlah']
                ])->id;


                // dd($no_transaksi);
                foreach ($data as $key => $value) {
                    tb_detail_transaksi::create([
                        'id_transaksi' => $id_transaksi,
                        'id_produk' => $value->id,
                        'qty' => $value->quantity,
                        'harga_produk' => $value->price,
                        'sum_total' => ($value->quantity * $value->price),
                    ]);
                }

                \Cart::session(auth()->id())->clear();


                return response()->json(['msg' => 'Berhasil Membuat Pesanan', 'status' => 200]);
            }
            // dd($data);
        } else {
            return response()->json(['msg' => 'Gagal Membuat Transaksi', 'status' => 401]);
        }

        // dd($data);
    }



    public function riwayatTransaksi()
    {
        $data = tb_transaksi::where('id_kasir', Auth::user()->id_kasir)
            ->orderByDesc('id')->get();
        return view('kasir.riwayat.index', compact(['data']));
    }
}
