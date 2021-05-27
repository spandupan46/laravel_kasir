<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_customer extends Model
{
    use HasFactory;

    protected $table = 'tb_customer';

    protected $fillable = [
        'nama_customer', 'subscription_status', 'subscription_start', 'subscription_end', 'status_login', 'created_at', 'updated_at'
    ];

    public function tb_produk()
    {
        return $this->hasMany('App\Models\tb_produk');
    }

    const created_at = NULL;
    const updated_at = NULL;
}
