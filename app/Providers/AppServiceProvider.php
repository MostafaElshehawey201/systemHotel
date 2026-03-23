<?php

namespace App\Providers;

use App\Interfaces\Auth\AuthRegisterRepositoryInterface;
use App\Interfaces\Auth\AuthRegisterServiceInterface;
use App\Repositories\Auth\AuthRepositoryProcess;
use App\Service\Auth\AuthServiceProcess;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            AuthRegisterServiceInterface::class,
            AuthServiceProcess::class,
        );
        $this->app->bind(
            AuthRegisterRepositoryInterface::class,
            AuthRepositoryProcess::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
