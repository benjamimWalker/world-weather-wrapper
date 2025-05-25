<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Weather API Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the settings for the weather API service.
    | You can set the API key and the base URL for the weather API.
    |
    */
    'base_url' => env('WEATHER_API_BASE_URL', 'https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timelinepreview/'),
];
