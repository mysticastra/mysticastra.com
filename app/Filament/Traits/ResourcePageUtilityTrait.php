<?php

namespace App\Filament\Traits;

trait ResourcePageUtilityTrait
{
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
