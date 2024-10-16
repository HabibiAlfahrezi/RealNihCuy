<?php

namespace App\Providers;

use App\Models\Pekerjaan;
use App\Observers\PekerjaanObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
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
        // Model::preventLazyLoading();
        Pekerjaan::observe(PekerjaanObserver::class);
        Paginator::useTailwind();
    }
}
