<?php

namespace App\Providers;

use App\Domain\Advertisement\Repositories\AdvertisementRepositoryInterface;
use App\Infrastructure\Persistence\EloquentAdvertisementRepository;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
