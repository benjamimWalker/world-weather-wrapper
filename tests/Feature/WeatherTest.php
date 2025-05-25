<?php

use App\Contracts\WeatherServiceInterface;
use App\Exceptions\WeatherApiException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

const weatherEndpoint = 'api/weather';

beforeEach(function () {
    Http::preventStrayRequests();
});

it('returns weather data for a valid city', function () {
    Http::fake([
        '*' => Http::response(['temp' => 22, 'condition' => 'Sunny']),
    ]);

    $this->getJson(weatherEndpoint . '/London')
        ->assertOk()
        ->assertJson([
        'temp' => 22,
        'condition' => 'Sunny',
    ]);
});

it('caches weather data using flexible caching', function () {
    Cache::shouldReceive('flexible')
        ->once()
        ->with('Paris', [30, 60], \Closure::class)
        ->andReturn(['temp' => 19]);

    $mock = Mockery::mock(WeatherServiceInterface::class);
    $mock->allows('getCurrentWeather')->never();

    $this->app->instance(WeatherServiceInterface::class, $mock);

    $this->getJson(weatherEndpoint . '/Paris')
        ->assertOk()
        ->assertJson([
        'temp' => 19,
    ]);
});

it('handles failed external weather API response', function () {
    Http::fake([
        '*' => Http::response([], 500),
    ]);

    $this->withoutExceptionHandling();

    $this->expectException(WeatherApiException::class);
    $this->getJson(weatherEndpoint . '/Nowhere');
});

it('throttles requests after limit is exceeded', function () {
    Http::fake([
        '*' => Http::response(['temp' => 22, 'condition' => 'Sunny']),
    ]);

    for ($i = 0; $i < 11; $i++) {
        $response = $this->getJson(weatherEndpoint . '/Berlin');
    }

    $response->assertTooManyRequests();
});
