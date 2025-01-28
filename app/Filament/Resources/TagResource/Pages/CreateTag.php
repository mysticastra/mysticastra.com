<?php

namespace App\Filament\Resources\TagResource\Pages;

use App\Filament\Resources\TagResource;
use App\Filament\Resources\TagResource\Forms\TagResourceForm;
use App\Filament\Traits\ResourcePageUtilityTrait;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateTag extends CreateRecord
{
    use ResourcePageUtilityTrait;

    protected static string $resource = TagResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema(TagResourceForm::getFields());
    }
}
