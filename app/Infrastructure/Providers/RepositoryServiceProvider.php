<?php

namespace App\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Advertisement\Repositories\AdvertisementRepositoryInterface;
use App\Infrastructure\Persistence\EloquentAdvertisementRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            AdvertisementRepositoryInterface::class,
            EloquentAdvertisementRepository::class
        );
    }

    public function boot()
    {
        //
    }
}
