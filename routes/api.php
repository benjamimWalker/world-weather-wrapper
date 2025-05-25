<?php

use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('weather/{city}', [WeatherController::class, 'getCurrentWeather'])->name('weather.get');
