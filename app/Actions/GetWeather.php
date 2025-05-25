<?php

namespace App\Actions;

use App\Contracts\WeatherServiceInterface;

class GetWeather
{
    public function __construct(
        protected WeatherServiceInterface $weatherService,
    ) {
    }

    public function handle(string $city): array
    {
        return cache()->flexible($city, [30, 60], fn () => $this->weatherService->getCurrentWeather($city));
    }
}
