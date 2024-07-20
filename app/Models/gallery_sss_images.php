<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// uuid
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class gallery_sss_images extends Model
{
    protected $table = 'sss_gallery_images';

    // Primary key bukan 'id'
    protected $primaryKey = 'id_image';

    // Primary key adalah tipe string
    protected $keyType = 'string';

    // Menggunakan UUID, jadi primary key bukan auto-incrementing
    public $incrementing = false;
    use HasFactory , HasUlids;
    protected $casts = [
        'image_path' => 'array',
    ];

    protected $fillable = [
        'id',
        'id_image',
        'title',
        'image_path',
        'sss_gallery_category_id',
    ];

    public function gallery_sss()
    {
        return $this->belongsTo(gallery_sss::class,'sss_gallery_category_id');
    }
}
