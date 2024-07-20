<?php

namespace App\Filament\Resources\GallerySssResource\Pages;

use App\Filament\Resources\GallerySssResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGallerySsses extends ListRecords
{
    protected static string $resource = GallerySssResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
