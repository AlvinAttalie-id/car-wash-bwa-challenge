<?php

namespace App\Filament\Resources\CarWashes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class CarWashForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('type_id')
                    ->required()
                    ->numeric(),
                TextInput::make('carwash_code')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                FileUpload::make('thumbnail')
                    ->disk('public')
                    ->directory('carwashes')
                    ->image()
                    ->imagePreviewHeight('150')
                    ->maxSize(2048)
                    ->label('Thumbnail'),
                TextInput::make('slug')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
            ]);
    }
}
