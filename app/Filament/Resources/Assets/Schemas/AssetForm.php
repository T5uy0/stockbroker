<?php

namespace App\Filament\Resources\Assets\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AssetForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('asset_type_id')
                    ->label('Type')
                    ->relationship('assetType', 'name')
                    ->searchable()
                    ->preload(),
                Select::make('company_id')
                    ->label('Entreprise')
                    ->relationship('company', 'name') // relation Asset::company()
                    ->searchable()
                    ->preload()
                    ->nullable()
                    ->helperText('Entreprise qui détient ou émet l’actif.')
                    ->createOptionForm([
                        TextInput::make('name')->label('Nom')->required()->unique(Company::class, 'name'),
                        TextInput::make('location')->label('Lieu'),
                        TextInput::make('website_url')->label('Site web')->url()->prefix('https://'),
                    ])
                    ->createOptionUsing(function (array $data) {
                        return Company::create($data)->getKey();
                    }),
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
