<?php

use App\Filament\Contracts\ResourceFieldContract;
use Filament\Support\Colors\Color;
use Filament\Tables;

final class TagResourceTable implements ResourceFieldContract
{
    public static function getFields(): array
    {
        return [
            Tables\Columns\TextColumn::make('name')
                ->badge()
                ->color(fn($record) => Color::hex($record->color))
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('slug')
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }
}
