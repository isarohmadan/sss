<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_merch_images extends Model
{
    use HasFactory;
    protected $fillable = [
        'merch_id', 'image_path',
    ];

    public function merch()
    {
        return $this->belongsTo(Merch::class);
    }

}
