<?php

namespace Modules\Settings\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

use Modules\Settings\Models\Setting;
use Modules\Settings\Policies\SettingPolicy;
use Modules\Settings\Repositories\Contracts\SettingRepositoryInterface;
use Modules\Settings\Repositories\Core\Eloquent\EloquentSettingRepository;

class SettingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();

        $this->loadMigrationsFrom(__DIR__.'/../Migrations');

        Gate::policy(Setting::class, SettingPolicy::class);
    }

    public function register()
    {
        $this->app->singleton(Setting::class, function ($app) {
            return new Setting();
        });

        $this->app->bind(
            SettingRepositoryInterface::class,
            EloquentSettingRepository::class
        );
    }

    private function registerRoutes()
    {
        Route::prefix('api')
            ->middleware(['auth:sanctum'])
            ->namespace('Modules\Settings\Http\Controllers')
            ->group(function () {
                require __DIR__.'/../Routes/api.php';
            });
    }

}
