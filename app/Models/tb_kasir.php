<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_kasir extends Model
{
    use HasFactory;
    protected $table = 'tb_kasir';

    protected $fillable = [
        'id_customer', 'id_user', 'id_toko', 'nama_kasir', 'created_at', 'updated_at'
    ];

    const created_at = NULL;
    const updated_at = NULL;
}
