<?php

namespace App\Filament\Resources\Roles\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class RoleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                CheckboxList::make('roles')
                    ->label('Rôles')
                    ->relationship('roles', 'name')   // relation User::roles()
                    ->columns(2)
                    ->helperText('Attribuer un ou plusieurs rôles à cet utilisateur.')
                    ->bulkToggleable(), // pratique si beaucoup de rôles
                TextInput::make('slug')
                    ->required(),
                TextInput::make('description')
                    ->default(null),
            ]);
    }
}
