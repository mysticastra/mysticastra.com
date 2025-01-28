<?php

use App\Filament\Contracts\ResourceFieldContract;
use Filament\Infolists\Components\Section;
use Filament\Infolists;
use Filament\Infolists\Components\Actions\Action;

final class TagResourceInfolist implements ResourceFieldContract
{
    /**
     * Get table columns
     *
     * @return array<Infolists\Components\Component>
     */
    public static function getFields(): array
    {
        return [
            Section::make('Tag Information')
                ->schema([
                    Infolists\Components\Grid::make(3)->schema([
                        Infolists\Components\TextEntry::make('name'),
                        Infolists\Components\TextEntry::make('slug'),
                        Infolists\Components\ColorEntry::make('color'),
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
