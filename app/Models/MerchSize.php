<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchSize extends Model
{
    use HasFactory;
    protected $table = 'merch_size';
    protected $fillable = [
        'merch_id', 'name', 'stock',
    ];

    public function merch()
    {
        return $this->belongsTo(Merch::class);
    }
}
