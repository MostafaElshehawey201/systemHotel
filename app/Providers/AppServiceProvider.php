<?php

namespace App\Providers;

use App\Interfaces\Auth\AuthChangePasswordRepositoryIntterface;
use App\Interfaces\Auth\AuthChangePasswordServiceInterface;
use App\Interfaces\Auth\AuthLoginRepositoryInterface;
use App\Interfaces\Auth\AuthLoginServiceInterface;
use App\Interfaces\Auth\AuthLogoutInterface;
use App\Interfaces\Auth\AuthRegisterRepositoryInterface;
use App\Interfaces\Auth\AuthRegisterServiceInterface;
use App\Interfaces\Auth\AuthResetChangePasswordRepositoryInterface;
use App\Interfaces\Auth\AuthResetChangePasswordServiceinterface;
use App\Interfaces\Auth\AuthResetEmailRepositoryInterface;
use App\Interfaces\Auth\AuthResetPasswordServiceInterface;
use App\Interfaces\Auth\AuthResetPhoneRepositoryInterface;
use App\Interfaces\Floor\CreateFloorRepositoryInterface;
use App\Interfaces\Floor\CreateFloorServiceInterface;
use App\Interfaces\Floor\FloorsRepositoryInterface;
use App\Interfaces\Floor\FloorsServiceInterface;
use App\Interfaces\Profile\ProfileUserInterface;
use App\Interfaces\Strategy\LoginManagerStrategyInterface;
use App\Interfaces\Strategy\ResetManagerStrategyInterface;
use App\Repositories\Auth\AuthRepositoryProcess;
use App\Repositories\Floor\FloorRepository;
use App\Service\Auth\AuthServiceProcess;
use App\Service\Floor\FloorService;
use App\Service\Profile\ProfileUserService;
use App\Strategies\Auth\LoginManagerStrategy;
use App\Strategies\Auth\ResetManagerStrategy;
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
        $this->app->bind(
            ProfileUserInterface::class,
            ProfileUserService::class,
        );
        $this->app->bind(
            AuthLogoutInterface::class,
            AuthServiceProcess::class,
        );
        $this->app->bind(
            AuthResetPasswordServiceInterface::class,
            AuthServiceProcess::class,
        );
        $this->app->bind(
            ResetManagerStrategyInterface::class,
            ResetManagerStrategy::class,
        );
        $this->app->bind(
            AuthResetEmailRepositoryInterface::class,
            AuthRepositoryProcess::class,
        );
        $this->app->bind(
            AuthResetPhoneRepositoryInterface::class,
            AuthRepositoryProcess::class,
        );
        $this->app->bind(
            AuthResetChangePasswordServiceinterface::class,
            AuthServiceProcess::class,
        );

        $this->app->bind(
            AuthResetChangePasswordRepositoryInterface::class,
            AuthRepositoryProcess::class,
        );
        $this->app->bind(
            AuthChangePasswordServiceInterface::class,
            AuthServiceProcess::class,
        );
        $this->app->bind(
            AuthChangePasswordRepositoryIntterface::class,
            AuthRepositoryProcess::class,
        );
        $this->app->bind(
            CreateFloorServiceInterface::class,
            FloorService::class,
        );
        $this->app->bind(
            CreateFloorRepositoryInterface::class,
            FloorRepository::class,
        );
        $this->app->bind(
            FloorsServiceInterface::class,
            FloorService::class,
        );
        $this->app->bind(
            FloorsRepositoryInterface::class,
            FloorRepository::class,
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
