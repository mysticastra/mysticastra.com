<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\CategoryResource\Forms\CategoryResourceForm;
use App\Filament\Traits\ResourcePageUtilityTrait;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    use ResourcePageUtilityTrait;

    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema(CategoryResourceForm::getFields());
    }
}
