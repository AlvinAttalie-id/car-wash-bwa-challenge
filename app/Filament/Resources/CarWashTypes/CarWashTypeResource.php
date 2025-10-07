<?php

namespace App\Filament\Resources\CarWashTypes;

use App\Filament\Resources\CarWashTypes\Pages\CreateCarWashType;
use App\Filament\Resources\CarWashTypes\Pages\EditCarWashType;
use App\Filament\Resources\CarWashTypes\Pages\ListCarWashTypes;
use App\Filament\Resources\CarWashTypes\Pages\ViewCarWashType;
use App\Filament\Resources\CarWashTypes\Schemas\CarWashTypeForm;
use App\Filament\Resources\CarWashTypes\Schemas\CarWashTypeInfolist;
use App\Filament\Resources\CarWashTypes\Tables\CarWashTypesTable;
use App\Models\CarWashType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class CarWashTypeResource extends Resource
{
    protected static ?string $model = CarWashType::class;

    protected static string | UnitEnum | null $navigationGroup = 'Activities';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArchiveBox;

    protected static ?string $recordTitleAttribute = 'CarWashType';

    public static function form(Schema $schema): Schema
    {
        return CarWashTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CarWashTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CarWashTypesTable::configure($table);
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
            'index' => ListCarWashTypes::route('/'),
            'create' => CreateCarWashType::route('/create'),
            'view' => ViewCarWashType::route('/{record}'),
            'edit' => EditCarWashType::route('/{record}/edit'),
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
