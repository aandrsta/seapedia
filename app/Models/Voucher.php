<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['code', 'discount_amount', 'remaining_usage', 'valid_until'];

    protected $casts = [
        'discount_amount' => 'decimal:2',
        'remaining_usage' => 'integer',
        'valid_until' => 'date',
    ];
}
