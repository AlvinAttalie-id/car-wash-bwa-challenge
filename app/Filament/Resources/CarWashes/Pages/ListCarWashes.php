<?php

namespace App\Filament\Resources\CarWashes\Pages;

use App\Filament\Resources\CarWashes\CarWashResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCarWashes extends ListRecords
{
    protected static string $resource = CarWashResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
