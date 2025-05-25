<?php

namespace App\Contracts;

interface WeatherServiceInterface
{
    public function getCurrentWeather(string $city): array;
}
