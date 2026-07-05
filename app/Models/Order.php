<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_number', 'buyer_id', 'store_id', 'voucher_id', 'promo_id',
        'delivery_method', 'delivery_address_id', 'subtotal', 'discount_amount',
        'delivery_fee', 'ppn_amount', 'total', 'status', 'deadline_date'
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        'delivery_fee' => 'decimal:2',
        'ppn_amount' => 'decimal:2',
        'total' => 'decimal:2',
        'deadline_date' => 'datetime',
    ];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }

    public function promo()
    {
        return $this->belongsTo(Promo::class);
    }

    public function address()
    {
        return $this->belongsTo(DeliveryAddress::class, 'delivery_address_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function statusHistories()
    {
        return $this->hasMany(OrderStatusHistory::class);
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }
}
