<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_produk extends Model
{
    use HasFactory;

    protected $table = 'tb_produk';

    protected $fillable = [
        'id_kategori',
        'id_toko',
        'id_customer',
        'nama_produk',
        'deskripsi_produk',
        'stok',
        'harga',
        'foto',
        'created_at',
        'updated_at'
    ];

    public function tb_customer()
    {
        return $this->belongsTo('App\Models\tb_customer');
    }
    public function tb_kategori()
    {
        return $this->belongsTo('App\Models\tb_kategori');
    }

    const created_at = NULL;
    const updated_at = NULL;
}
