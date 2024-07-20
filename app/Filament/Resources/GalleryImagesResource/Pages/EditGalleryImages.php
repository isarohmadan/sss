<?php

namespace App\Filament\Resources\GalleryImagesResource\Pages;

use App\Filament\Resources\GalleryImagesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGalleryImages extends EditRecord
{
    protected static string $resource = GalleryImagesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
