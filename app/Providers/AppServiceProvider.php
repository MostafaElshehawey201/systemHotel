<?php

namespace App\Providers;

use App\Interfaces\Auth\AuthLoginRepositoryInterface;
use App\Interfaces\Auth\AuthLoginServiceInterface;
use App\Interfaces\Auth\AuthRegisterRepositoryInterface;
use App\Interfaces\Auth\AuthRegisterServiceInterface;
use App\Interfaces\Strategy\LoginManagerStrategyInterface;
use App\Repositories\Auth\AuthRepositoryProcess;
use App\Service\Auth\AuthServiceProcess;
use App\Strategies\Auth\LoginManagerStrategy;
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
        $this->app->bind(
            AuthLoginServiceInterface::class,
            AuthServiceProcess::class,
        );
        $this->app->bind(
            AuthLoginRepositoryInterface::class,
            AuthRepositoryProcess::class,
        );
        $this->app->bind(
            LoginManagerStrategyInterface::class,
            LoginManagerStrategy::class,
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
