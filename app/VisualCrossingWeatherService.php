<?php

namespace App;

use App\Contracts\WeatherServiceInterface;
use App\Exceptions\WeatherApiException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;
use Response;

class VisualCrossingWeatherService implements WeatherServiceInterface
{
    /**
     * @throws WeatherApiException
     * @throws ConnectionException
     */
    public function getCurrentWeather(string $city): array
    {
        $response = Http::retry(3, 100)
            ->timeout(4)
            ->get(config('weather.base_url') . $city);

        if ($response->failed()) {
            throw new WeatherApiException(
                'Failed to fetch weather data',
                $response->status()
            );
        }

        return $response->json();
    }
}
