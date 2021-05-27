<?php

namespace App\Http\Controllers;

use App\Models\tb_kasir;
use App\Models\tb_kategori;
use App\Models\tb_produk;
use App\Models\tb_toko;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// DB

// Auth
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    //
    public function index()
    {
        //
        return view('customer.index');
    }

    // Toko

    public function indexToko()
    {
        $data = tb_toko::where('id_customer', Auth::user()->id_customer)->get();
        return view('customer.toko.index', compact(['data']));
    }

    public function postToko(Request $request)
    {
        // dd($request->all());
        //4
        // return view()

        $validator = Validator::make($request->all(), [
            'nama_toko' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Gagal Menambahkan Data');
        } else {
            $data = tb_toko::create([
                'id_customer' => Auth::user()->id_customer,
                'nama_toko' => $request['nama_toko'],
                'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'Berhasil menambahkan toko baru');
        }
    }

    public function detailToko($id)
    {
        $data = tb_toko::where('id', $id)
            ->where('id_customer', Auth::user()->id_customer)
            ->first();

        if ($data == NULL) {
            abort(404);
        } else {
            $produk = DB::table('tb_produk')
                ->join('tb_kategori', 'tb_produk.id_kategori', 'tb_kategori.id')
                ->where('tb_produk.id_customer', Auth::user()->id_customer)
                ->where('tb_produk.id_toko', $id)
                ->select('tb_produk.*', 'tb_kategori.nama_kategori')
                ->paginate(3);

            // dd($produk);
            return view('customer.toko.detail', compact(['data', 'produk']));
        }
    }


    // Kategori
    public function indexKategori()
    {
        //

        $data = tb_kategori::where('id_customer', Auth::user()->id_customer)
            ->get();
        return view('customer.kategori.index', compact(['data']));
    }

    public function postKategori(Request $request)
    {
        $data = $request->all();

        // dd(Auth::user());
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Pastikan Semua Field terisi');
        } else {

            // dd(Auth::user());
            $new = tb_kategori::create([
                'id_customer' => Auth::user()->id_customer,
                'nama_kategori' => $request['nama_kategori'],
                'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'Berhasil menambahkan Kategori Baru');
        }
    }

    public function editKategori(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Pastikan Semua Field terisi');
        } else {

            // dd(Auth::user());
            $new = tb_kategori::where('id', $request['id'])
                ->update([
                    // 'id_customer' => Auth::user()->id_customer,
                    'nama_kategori' => $request['nama_kategori'],
                    'created_at' => Carbon::now()
                ]);
            return back()->with('success', 'Berhasil mengubah Kategori Baru');
        }
    }

    public function deleteKategori(Request $request)
    {
        $data = tb_kategori::findOrFail($request['id'])
            ->delete();

        return back()->with('success', 'Berhasil menghapus data Kategori');
    }

    // End Kategori

    // Produk
    public function indexProduk()
    {
        // dd('ok');

        $kategori = tb_kategori::where('id_customer', Auth::user()
            ->id_customer)->get();

        $toko = tb_toko::where('id_customer', Auth::user()->id_customer)->get();

        // dd($kategori);
        // $data = \App\Models\tb_produk::with(['tb_kategori', 'tb_customer'])->first();

        $data = DB::table('tb_produk')
            ->join('tb_kategori', 'tb_produk.id_kategori', '=', 'tb_kategori.id')
            ->join('tb_toko', 'tb_produk.id_toko', 'tb_toko.id')
            ->where('tb_produk.id_customer', Auth::user()->id_customer)
            ->select('tb_produk.*', 'tb_toko.nama_toko', 'tb_kategori.nama_kategori')
            ->get();

        // dd($data);
        // $data = DB::table('t')
        //     ->join('tb_kategori', 'tb_produk.id_kategori', 'tb_kategori.id')
        //     ->where('tb_produk.id_customer', Auth::user()->id_customer)
        //     ->get();

        // dd($data);

        // $data = tb_produk::where('id_customer', Auth::user()->id_customer)->get();
        return view('customer.produk.index', compact(['data', 'kategori', 'toko']));
    }

    public function postProduk(Request $request)
    {
        //
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'id_toko' => 'required',
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'foto_produk' => 'required|image|mimes:jpg,jpeg,gif,png|max:2048'
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Semua field harus diisi');
        } else {
            if ($request['foto_produk'] !== NULL) {
                $file = $request['foto_produk'];
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./uploads/foto_produk/', $fileName);

                $data = tb_produk::create([
                    'id_kategori' => $request['id_kategori'],
                    'id_toko' => $request['id_toko'],
                    'id_customer' => Auth::user()->id_customer,
                    'nama_produk' => $request['nama_produk'],
                    'deskripsi_produk' => $request['deskripsi_produk'],
                    'stok' => $request['stok'],
                    'harga' => $request['harga'],
                    'foto' => $fileName,
                    'created_at' => Carbon::now()
                ]);
                return back()->with('success', 'Berhasil menambahkan Data');
            } else {
                return redirect()->back()->with('error', 'Gagal menambahkan data baru');
            }
        }
    }
    public function editProduk(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'id_kategori' => 'required',
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'foto_produk' => 'image|mimes:jpg,jpeg,gif,png|max:2048'
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Semua field harus diisi');
        } else {
            if ($request['foto_produk'] !== NULL) {
                $file = $request['foto_produk'];
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('./uploads/foto_produk/', $fileName);

                $data = tb_produk::findOrFail($request['id'])
                    ->update([
                        'id_kategori' => $request['id_kategori'],
                        'id_customer' => Auth::user()->id_customer,
                        'nama_produk' => $request['nama_produk'],
                        'deskripsi_produk' => $request['deskripsi_produk'],
                        'stok' => $request['stok'],
                        'harga' => $request['harga'],
                        'foto' => $fileName,
                        'updated_at' => Carbon::now()
                    ]);
                return back()->with('success', 'Berhasil menambahkan Data');
            } else {
                $data = tb_produk::findOrFail($request['id'])
                    ->update([
                        'id_kategori' => $request['id_kategori'],
                        'id_customer' => Auth::user()->id_customer,
                        'nama_produk' => $request['nama_produk'],
                        'deskripsi_produk' => $request['deskripsi_produk'],
                        'stok' => $request['stok'],
                        'harga' => $request['harga'],
                        'updated_at' => Carbon::now()
                    ]);
                return back()->with('success', 'Berhasil menambahkan Data');
            }
        }
    }
    public function deleteProduk(Request $request)
    {

        $data = tb_produk::findOrFail($request['id'])
            ->delete();

        return back()->with('success', 'Berhasil menghapus data Produk');
    }

    public function indexKasir()
    {
        //
        $data = tb_kasir::where('id_customer', Auth::user()->id_customer)->get();
        return view('customer.kasir.index', compact(['data']));
    }

    public function postKasir(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'nama_kasir' => 'required',
            'password' => 'required',
        ]);

        // dd($request->all());

        if ($validator->fails()) {
            return back()->with('error', 'Semua field harus diisi');
        } else {
            if ($request['password'] !== $request['re-password']) {
                return back()->with('error', 'Password Tidak Sama !!!');
            } else {
                $id_kasir = tb_kasir::insertGetId([
                    'id_customer' => Auth::user()->id_customer,
                    'nama_kasir' => $request['nama_kasir'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);

                User::create([
                    'name' => $request['nama_kasir'],
                    'email' => $request['email'],
                    'id_kasir' => $id_kasir,
                    'password' => Hash::make($request['password']),
                    'roles' => 2,
                    'created_at' => Carbon::now()
                ]);

                return back()->with('success', 'Berhasil menambahkan data kasir');
            }
        }
    }

    public function deleteKasir(Request $request)
    {
        $data = tb_kasir::findOrFail($request['id'])
            ->delete();

        User::where('id_kasir', $request['id'])
            ->delete();

        return back()->with('success', 'Berhasil menghapus data kasir');
    }
}
