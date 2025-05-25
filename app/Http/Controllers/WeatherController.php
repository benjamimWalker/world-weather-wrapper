<?php

namespace App\Http\Controllers;

use App\Actions\GetWeather;
use Illuminate\Http\JsonResponse;

class WeatherController extends Controller
{
    public function __construct(
        private readonly GetWeather $getWeather,
    ) {
    }

    public function getCurrentWeather(string $city): JsonResponse
    {
        return response()->json($this->getWeather->handle($city));
    }
}
