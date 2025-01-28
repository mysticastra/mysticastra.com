<?php

namespace App\Filament\Resources\CategoryResource\Tables;

use App\Filament\Contracts\ResourceFieldContract;
use App\Filament\Resources\CategoryResource\Forms\CategoryResourceForm;
use App\Models\Category;
use Filament\Tables;
use Filament\Tables\Actions\Action;

final class CategoryResourceTable implements ResourceFieldContract
{
    /**
     * Get table columns
     *
     * @return array<Tables\Columns\Column>
     */
    public static function getFields(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')
                ->label('ID')
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('name')
                ->toggleable()
                ->searchable(),
            Tables\Columns\TextColumn::make('slug')
                ->toggleable()
                ->searchable(),
            Tables\Columns\TextColumn::make('status')
                ->toggleable()
                ->action(
                    Action::make('Update Status')
                        ->form(fn($record) => CategoryResourceForm::getStatusFields($record))
                        ->action(fn(Category $record, $data) => $record->update(['status' => $data['status']]))
                        ->visible((bool)auth()->user()?->can('update_category')),
                )
                ->icon(auth()->user()?->can('update_category') ? __('icon.actions.edit') : null) //@phpstan-ignore-line
                ->badge(),
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
