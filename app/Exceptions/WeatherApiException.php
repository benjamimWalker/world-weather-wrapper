<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class WeatherApiException extends Exception
{
    public function __construct($message = 'Weather API error', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'error' => 'Weather API error',
            'message' => $this->getMessage(),
        ], Response::HTTP_BAD_GATEWAY);
    }

    public function report(): void
    {
        logger()->error(
            'Weather API error',
            [
                'code' => $this->getCode(),
                'message' => $this->getMessage(),
                'trace' => $this->getTraceAsString()
            ]
        );
    }
}
