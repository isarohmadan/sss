<?php

namespace App\Filament\Resources\GalleryImagesResource\Pages;

use App\Filament\Resources\GalleryImagesResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateGalleryImages extends CreateRecord
{
    protected static string $resource = GalleryImagesResource::class;

}
