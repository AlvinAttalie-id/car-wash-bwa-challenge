<?php

namespace App\Filament\Resources\CarWashes;

use App\Filament\Resources\CarWashes\Pages\CreateCarWash;
use App\Filament\Resources\CarWashes\Pages\EditCarWash;
use App\Filament\Resources\CarWashes\Pages\ListCarWashes;
use App\Filament\Resources\CarWashes\Pages\ViewCarWash;
use App\Filament\Resources\CarWashes\Schemas\CarWashForm;
use App\Filament\Resources\CarWashes\Schemas\CarWashInfolist;
use App\Filament\Resources\CarWashes\Tables\CarWashesTable;
use App\Models\CarWash;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarWashResource extends Resource
{
    protected static ?string $model = CarWash::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CarWash';

    public static function form(Schema $schema): Schema
    {
        return CarWashForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CarWashInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CarWashesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCarWashes::route('/'),
            'create' => CreateCarWash::route('/create'),
            'view' => ViewCarWash::route('/{record}'),
            'edit' => EditCarWash::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
