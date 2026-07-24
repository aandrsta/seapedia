<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'reviewer_name', 'rating', 'comment'];

    protected $casts = [
        'rating' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
