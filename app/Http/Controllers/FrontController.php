<?php

namespace App\Http\Controllers;

use App\Models\tb_customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    //
    public function indexDaftar()
    {
        //r
        return view('front.daftar');
    }

    public function postDaftar(Request $request)
    {
        $data = $request->all();

        // dd($data);

        $rule = [
            'nama_customer' => 'required',
            'email' => 'email|required',
            'password' => 'required',
        ];
        // dd($data);

        $validator = Validator::make($data, $rule);

        if ($validator->fails()) {
            return back()->with('error', 'Pastikan Semua Field terisi');
        } else {

            if ($request['password'] == $request['re-password']) {
                // dd('true');

                $cust_id = DB::table('tb_customer')
                ->insertGetId([
                    'nama_customer' => $request['nama_customer'],
                    'subscription_status' => 0,
                    'status_login' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                // dd($cust_id);
                if ($cust_id) {
                    # code...
                    $data = User::create([
                        'name' => $request['nama_customer'],
                        'id_customers' => $cust_id,
                        'email' => $request['email'],
                        'password' => Hash::make($request['password']),
                        'roles' => 1,
                        'created_at' => Carbon::now()
                    ]);
                    return redirect('login')->with('success', 'Berhasil Mendaftar, Silakan Login !!!');
                }else{
                    return back()->with('error', 'Gagal Mendapatkan ID User');
                }

            } else {
                // dd('false');

                return back()->with('error', 'Password harus sama !!!');
            }
        }
        // dd($data);
    }
}
