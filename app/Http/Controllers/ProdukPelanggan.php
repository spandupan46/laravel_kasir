<?php

namespace App\Http\Controllers;

// use Darryldecode\Cart\Validators\Validator;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukPelanggan extends Controller
{
    //
    public function index()
    {
        $data = DB::table('tb_produk_pelanggan')->get();
        return view('admin.produk_pelanggan.index', compact(['data']));
    }

    public function postProdukPelanggan(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'durasi' => 'required|numeric',
            'harga'=>'required|numeric',
            'maks_toko'=>'required|numeric',
            'maks_kasir'=>'required|numeric',
        ]);

        if ($validator->fails()) {
            # code...
            return back()->withErrors($validator);
        }else{
            DB::table('tb_produk_pelanggan')->insert([
                'nama_produk'=>$request['nama_produk'],
                'durasi'=>$request['durasi'],
                'harga'=>$request['harga'],
                'maks_toko'=>$request['maks_toko'],
                'maks_kasir'=>$request['maks_kasir'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            return back()->with('success', 'Berhasil Menambahkan Produk Pelanggan');
        }
    }

    public function detailProdukPelanggan($id)
    {
        $data = DB::table('tb_detail_produk_pelanggan')
        ->join('tb_produk_pelanggan', 'tb_detail_produk_pelanggan.id_produk', 'tb_produk_pelanggan.id')
        ->where('id_produk', $id)->get();

        return view('admin.produk_pelanggan.detail', compact(['data', 'id']));
    }

    public function postDeskripsiProduk(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'id_produk'=>'required|numeric',
            'deskripsi_produk'=>'required'
        ]);

        if ($validator->fails()) {
            # code...
            return back()->withErrors($validator);
        }else{
            DB::table('tb_detail_produk_pelanggan')
            ->insert([
                'id_produk' => $request['id_produk'],
                'deskripsi_produk' => $request['deskripsi_produk'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
    
            return back()->with('success', 'Berhasil Menambahkan Deskripsi Produk');
        }
    }
}
