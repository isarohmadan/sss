<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class merch extends Model
{
    protected $table = 'merch';
    public function images()
    {
        return $this->hasMany(product_merch_images::class);
    }
    public function merch_transaction()
    {
        return $this->hasMany(merch_transaction::class);
    }
    use HasFactory;
}
