<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Merch_Category;
use Illuminate\Support\Str;
// import ulids
use Illuminate\Database\Eloquent\Concerns\HasUlids;


class Merch extends Model
{
    protected $table = 'merch';
    
    // Primary key bukan 'id'
    protected $primaryKey = 'id_merch';

    // Primary key adalah tipe string
    protected $keyType = 'string';

    // Menggunakan UUID, jadi primary key bukan auto-incrementing
    public $incrementing = false;
    use HasFactory , HasUlids;


    protected $casts = [
        'merch_size' => 'array',
    ];


    public function merchCategory()
    {
        return $this->belongsTo(Merch_Category::class, 'category_id','id_category');
    }

    // Mutator
    public function setMerchSizeAttribute($value)
    {
        $validateMerchSize = $this->validateMerchSizeAttribute($value);
        $this->attributes['merch_size'] = json_encode($validateMerchSize);
    }

    private function validateMerchSizeAttribute($value)
    {
        $validatedMerchSize = [];
        foreach ($value as $size) {
            $validatedMerchSize[] = [
                'size' => $size['size'],
                'stock' => $size['stock'],
            ];
        }
        return $validatedMerchSize;
    }


    public function merch_transaction()
    {
        return $this->hasMany(merch_transaction::class);
    }


    protected static function boot()
    {
        parent::boot();

        // Hook into the creating event to set slug_category
        static::creating(function ($model) {
            if (empty($model->slug_merch)) {
                $model->slug_merch = Str::slug($model->title);
            }
        });

           // Hook into the saving event to set slug_category for both creating and updating
      static::saving(function ($model) {
          if (!empty($model->slug_merch)) {
              $model->slug_merch = Str::slug($model->title);
          }else{
              $model->slug_merch = Str::slug($model->title);
          }
      });
    }
    use HasFactory;
}
