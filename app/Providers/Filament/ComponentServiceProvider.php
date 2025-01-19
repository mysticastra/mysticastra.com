<?php

namespace App\Providers\Filament;

use App\Filament\Utilities\ComponentGlobalConfiguration;
use Illuminate\Support\ServiceProvider;

/**
 * @property mixed $visible
 *
 * @method visible($condition)
 */
class ComponentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        ComponentGlobalConfiguration::configure();
    }
}
