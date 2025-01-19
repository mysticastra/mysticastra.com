<?php

namespace App\Filament\Resources\CategoryResource\Forms;

use App\Filament\Contracts\ResourceFieldContract;
use App\Enums\CategoryStatus;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Component;

final class CategoryResourceForm implements ResourceFieldContract
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
            Forms\Components\RichEditor::make('description')
                ->columnSpanFull(),
            ...self::getStatusFields(),
        ];
    }

    /**
     * Get form fields
     *
     * @return array<Component>
     */
    public static function getStatusFields(?Category $record = null): array
    {
        return [
            Forms\Components\Select::make('status')
                ->options(CategoryStatus::class)
                ->columnSpanFull()
                ->default($record?->status)
                ->required(),
        ];
    }
}
