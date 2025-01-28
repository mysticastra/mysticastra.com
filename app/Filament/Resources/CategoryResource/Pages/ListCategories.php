<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Enums\CategoryStatus;
use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\CategoryResource\Tables\CategoryResourceTable;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use Filament\Tables;

class ListCategories extends ListRecords
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns(CategoryResourceTable::getFields())
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(CategoryStatus::class),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                ]),
            ]);
    }
}
