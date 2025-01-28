<?php

namespace App\Filament\Resources\TagResource\Forms;

use App\Filament\Contracts\ResourceFieldContract;
use Filament\Forms;
use Filament\Forms\Components\Component;

final class TagResourceForm implements ResourceFieldContract
{
    /**
     * Get form fields
     *
     * @return array<Component>
     */
    public static function getFields(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('slug')
                ->required()
                ->maxLength(255),
            Forms\Components\ColorPicker::make('color')
                ->required(),
            Forms\Components\TextInput::make('description')
                ->maxLength(255),
        ];
    }
}
