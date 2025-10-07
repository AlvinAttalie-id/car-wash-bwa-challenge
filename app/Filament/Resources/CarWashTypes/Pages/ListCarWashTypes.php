<?php

namespace App\Filament\Resources\CarWashTypes\Pages;

use App\Filament\Resources\CarWashTypes\CarWashTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCarWashTypes extends ListRecords
{
    protected static string $resource = CarWashTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
