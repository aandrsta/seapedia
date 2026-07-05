<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = ['code', 'discount_percentage', 'max_discount', 'valid_until'];

    protected $casts = [
        'discount_percentage' => 'decimal:2',
        'max_discount' => 'decimal:2',
        'valid_until' => 'date',
    ];
}
