<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Routing\Middleware\ThrottleRequestsWithRedis;
use Illuminate\Support\Facades\Route;

Route::get('weather/{city}', [WeatherController::class, 'getCurrentWeather'])
    ->middleware(ThrottleRequestsWithRedis::using('weather'))
    ->name('weather.get');
