<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class Merch_Category extends Model
{
    protected $table = 'merch_category';
    protected $primaryKey = 'id_category';
    protected $fillable = [
        'id_category',
        'name_category',
        'slug_category',
        'description',
    ];

      // Boot method to define model event hooks
      protected static function boot()
      {
          parent::boot();
  
          // Hook into the creating event to set slug_category
          static::creating(function ($model) {
              if (empty($model->slug_category)) {
                  $model->slug_category = Str::slug($model->name_category);
              }
          });
  
             // Hook into the saving event to set slug_category for both creating and updating
        static::saving(function ($model) {
            if (!empty($model->slug_category)) {
                $model->slug_category = Str::slug($model->name_category);
            }else{
                $model->slug_category = Str::slug($model->name_category);
            }
        });
      }

    use HasFactory;
}
