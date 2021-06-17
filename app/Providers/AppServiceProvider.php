<?php

namespace App\Providers;


use Floorfy\Agency\Properties\Domain\PropertyRepository;
use Floorfy\Agency\Properties\Infrastructure\EloquentPropertyRepository;
use Floorfy\Agency\Tours\Domain\TourRepository;
use Floorfy\Agency\Tours\Infrastructure\EloquentTourRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            PropertyRepository::class,
            EloquentPropertyRepository::class
        );

        $this->app->bind(
            TourRepository::class,
            EloquentTourRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
