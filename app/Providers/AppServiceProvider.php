<?php

namespace App\Providers;

use App\Enums\MorphMapEnum;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Use immutable dates.
        Date::use(CarbonImmutable::class);

        // Prevent accessing attributes that were not loaded from the database. Instead of returning null, an exception will be thrown
        Model::preventAccessingMissingAttributes();

        // No mass assignment protection at all.
        Model::unguard();
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
