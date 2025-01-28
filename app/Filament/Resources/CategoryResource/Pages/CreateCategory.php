<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Filament\Resources\CategoryResource\Forms\CategoryResourceForm;
use App\Filament\Traits\ResourcePageUtilityTrait;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateCategory extends CreateRecord
{
    use ResourcePageUtilityTrait;

    protected static string $resource = CategoryResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema(CategoryResourceForm::getFields());
    }
}
