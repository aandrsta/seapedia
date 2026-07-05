<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['store_id', 'name', 'description', 'price', 'stock', 'image_url', 'category', 'sold_count', 'rating'];

    protected $casts = [
        'price'      => 'decimal:2',
        'stock'      => 'integer',
        'sold_count' => 'integer',
        'rating'     => 'decimal:1',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
