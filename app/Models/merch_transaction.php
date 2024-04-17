<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class merch_transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'merch_id', 'user_id', 'quantity', 'total_price', 'payment_url', 'payment_type', 'payment_code', 'transaction_time',
    ];

    public function merch()
    {
        return $this->belongsTo(Merch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
