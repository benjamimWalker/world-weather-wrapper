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
        return $this->weatherService->getCurrentWeather($city);
    }
}
