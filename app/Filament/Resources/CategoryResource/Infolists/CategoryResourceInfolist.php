<?php

namespace App\Filament\Resources\CategoryResource\Infolists;

use App\Filament\Contracts\ResourceFieldContract;
use App\Filament\Resources\CategoryResource\Forms\CategoryResourceForm;
use App\Models\Category;
use Filament\Infolists;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\Section;

final class CategoryResourceInfolist implements ResourceFieldContract
{
    /**
     * Get table columns
     *
     * @return array<Infolists\Components\Component>
     */
    public static function getFields(): array
    {
        return [
            Section::make('Category Information')
                ->schema([
                    Infolists\Components\Grid::make()->schema([
                        Infolists\Components\TextEntry::make('name'),
                        Infolists\Components\TextEntry::make('slug'),
                        Infolists\Components\TextEntry::make('status')
                            ->action(
                                Action::make('Update Status')
                                    ->form(fn($record) => CategoryResourceForm::getStatusFields($record))
                                    ->action(fn(Category $record, $data) => $record->update(['status' => $data['status']]))
                                    ->visible((bool)auth()->user()?->can('update_category')),
                            )
                            ->icon(auth()->user()?->can('update_category') ? __('icon.actions.edit') : null) //@phpstan-ignore-line
                            ->badge(),
                        Infolists\Components\TextEntry::make('posts_count')
                            ->label('Posts')
                            ->badge()
                            ->getStateUsing(fn($record) => $record->posts()->count()),
                    ]),
                ])
                ->icon('heroicon-o-information-circle'),
            Section::make('Content')
                ->schema([
                    Infolists\Components\TextEntry::make('description')
                        ->label('')
                        ->html()
                ])
                ->icon('heroicon-o-document-text'),
        ];
    }
}
