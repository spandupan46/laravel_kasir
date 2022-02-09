<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class helper{
    
    public static function getDetail(){
        // 
        return "ok";
    }

    public static function CutJudul($string, $limit)
    {
        $words = substr($string, 0,$limit);
        return $words;
    }

    public static function getDeskripsi($id)
    {
        $data = DB::table('tb_detail_produk_pelanggan')
        ->where('id_produk',$id)
        ->get();

        // dd($data);

        if ($data->isEmpty()) {
            return NULL;
        }else{
            return $data;
        }
    }

    public static function strtotime($var)
    {
        
        $expire_time = date('Y-m-d H:i:s', $var);
        // $expire_time = $var->format('Y-m-d H:i');
        // dd($expire_time);
        return $expire_time;
    }


    public static function cek_expired_time($var)
    {
        // $expire_time_db = date('Y-m-d H:i:s', $var);
        $expire_time_db = $var;

        $time_now = strtotime(Carbon::now());

        if ($expire_time_db >= $time_now) {
            # code...
            // dd(true);
            return true;
        }else{
            // dd(false);
            return false;
        }
    }
}

?>