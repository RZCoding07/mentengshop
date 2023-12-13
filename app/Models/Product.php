<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    protected $fillable = ['name', 'description', 'price', 'type'];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
