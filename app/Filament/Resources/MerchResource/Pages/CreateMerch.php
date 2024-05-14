<?php

namespace App\Filament\Resources\MerchResource\Pages;

use App\Filament\Resources\MerchResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\MerchSize;
use App\Models\product_merch_images;
use Illuminate\Database\Eloquent\Model;

class CreateMerch extends CreateRecord
{
    protected static string $resource = MerchResource::class;
    
    protected function handleRecordCreation(array $data): Model
    {
        $record = parent::handleRecordCreation($data);

        
       

        return $record;
        
    }
}
