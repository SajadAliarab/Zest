<?php

namespace App\Providers;

use App\Enums\MorphMapEnum;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Enforce morph mapping
        Relation::enforceMorphMap(MorphMapEnum::options());
    }
}
