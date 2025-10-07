<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BookingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('booking_code'),
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('car_wash_id')
                    ->numeric(),
                TextEntry::make('car_id')
                    ->numeric(),
                TextEntry::make('discount_id')
                    ->numeric(),
                TextEntry::make('booking_date')
                    ->date(),
                TextEntry::make('booking_time')
                    ->time(),
                TextEntry::make('status'),
                TextEntry::make('deleted_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
