<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class gallery_sss extends Model
{
    protected $table = 'sss_gallery_categories';
    use HasFactory;
    protected static function boot()
    {
        parent::boot();

        // Hook into the creating event to set slug
        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });

           // Hook into the saving event to set slug for both creating and updating
      static::saving(function ($model) {
          if (!empty($model->slug)) {
              $model->slug = Str::slug($model->title);
          }else{
              $model->slug = Str::slug($model->title);
          }
      });
    }
}

