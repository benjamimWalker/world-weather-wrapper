<?php

namespace App\Providers;

use App\Contracts\WeatherServiceInterface;
use App\VisualCrossingWeatherService;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
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
        $this->app->bind(WeatherServiceInterface::class, VisualCrossingWeatherService::class);

        RateLimiter::for('weather', function (Request $request) {
            return [
                Limit::perSecond(10)->by($request->ip()),
                Limit::perMinute(100)->by($request->ip())
            ];
        });
    }
}
