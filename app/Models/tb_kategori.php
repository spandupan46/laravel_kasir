<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_kategori extends Model
{
    use HasFactory;

    protected $table = 'tb_kategori';

    protected $fillable = [
        'id_customer', 'id_toko', 'nama_kategori', 'created_at', 'updated_at'
    ];

    public function tb_produk()
    {
        return $this->hasMany('App\Models\tb_produk');
    }

    const created_at = NULL;
    const updated_at = NULL;
}
