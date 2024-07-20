<?php

namespace App\Filament\Resources\GallerySssResource\Pages;

use App\Filament\Resources\GallerySssResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGallerySss extends EditRecord
{
    protected static string $resource = GallerySssResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
