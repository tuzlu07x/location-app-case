<?php

namespace App\Providers;

use App\Repositories\LocationRepository;
use App\Repositories\LocationRepositoryImpl;
use App\Services\LocationService;
use App\Services\LocationServiceImpl;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->serviceBinds();
        $this->repositoryBinds();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    private function serviceBinds(): void
    {
        $this->app->bind(LocationServiceImpl::class, LocationService::class);
    }

    private function repositoryBinds(): void
    {
        $this->app->bind(LocationRepositoryImpl::class, LocationRepository::class);
    }
}
