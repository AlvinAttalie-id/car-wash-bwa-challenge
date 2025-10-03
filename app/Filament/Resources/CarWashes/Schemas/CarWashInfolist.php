<?php

namespace App\Filament\Resources\CarWashes\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class CarWashInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('type_id')
                    ->numeric(),
                TextEntry::make('carwash_code'),
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('price')
                    ->money(),
                TextEntry::make('deleted_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
