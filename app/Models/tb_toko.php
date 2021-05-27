<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_toko extends Model
{
    use HasFactory;

    protected $table = 'tb_toko';

    protected $fillable = [
        'id_customer',
        'nama_toko',
        'created_at',
        'updated_at',
    ];

    const created_at = NULL;
    const updated_at = NULL;
}
