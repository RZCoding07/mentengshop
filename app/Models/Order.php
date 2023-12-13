<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'name',
        'telp',
        'email',
        'alamat',
        'model_payet',
        'warna',
        'banyak_payet',
        'tanggal_pengambilan',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'model_payet', 'id');
    }
}
