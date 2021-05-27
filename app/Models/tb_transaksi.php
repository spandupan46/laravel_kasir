<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_transaksi extends Model
{
    use HasFactory;

    protected $table = 'tb_transaksi';

    protected $fillable = [
        'id_kasir',
        'id_toko',
        'no_transaksi',
        'sum_total',
    ];
}
