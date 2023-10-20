<?php

namespace App\Providers;

use App\Interfaces\EmployeeRepositoryInterface;
use App\Services\EmployeeRepositoryService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public array $bindings = [
        EmployeeRepositoryInterface::class => EmployeeRepositoryService::class
    ];

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
        //
    }
}
