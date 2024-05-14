<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Merch extends Model
{
    protected $table = 'merch';
    protected $casts = [
        'images' => 'array',
        'merch_size' => 'array',
    ];

    // Mutator
    public function setImagesAttribute($value)
    {
        $validateImages = $this->validateImagesAttribute($value);
        $this->attributes['images'] = json_encode($validateImages, JSON_UNESCAPED_SLASHES);

    }

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
                'merch_id' => $this->id,
            ];
        }
        return $validatedMerchSize;
    }

    private function validateImagesAttribute($value)
    {
        $validatedImages = [];

        foreach ($value as $image) {
            $validatedImages[] = [
                'image_path' => $image['image_path'],
                'image_id' => $this->id,
            ];
        }
        return $validatedImages;
    }


    public function merch_transaction()
    {
        return $this->hasMany(merch_transaction::class);
    }
    use HasFactory;
}
