<?php

namespace App\Filament\Resources\Assets\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('type')
                    ->required(),
                TextInput::make('currency')
                    ->required()
                    ->default('EUR'),
                TextInput::make('quantity')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('purchase_unit_price')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                TextInput::make('fees_total')
                    ->required()
                    ->numeric()
                    ->default(0.0),
                Textarea::make('meta')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
