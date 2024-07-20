<?php

namespace App\Filament\Resources\MerchCategoryResource\Pages;

use App\Filament\Resources\MerchCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMerchCategories extends ListRecords
{
    protected static string $resource = MerchCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
