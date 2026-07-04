<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['store_id', 'name', 'description', 'price', 'stock', 'image_url'];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
