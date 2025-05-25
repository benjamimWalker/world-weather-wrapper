<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Support\Facades\Route;

Route::get('weather/{city}', [WeatherController::class, 'getCurrentWeather'])
    ->middleware(ThrottleRequests::using('weather'))
    ->name('weather.get');
