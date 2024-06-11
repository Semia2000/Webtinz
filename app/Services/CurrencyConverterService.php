<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CurrencyConverterService
{
    public function convert($from, $to, $amount)
    {
        $apiKey = config('services.exchangerate.api_key');
        $url = "https://v6.exchangerate-api.com/v6/{$apiKey}/pair/{$from}/{$to}/{$amount}";

        $response = Http::get($url);

        if ($response->successful()) {
            return $response->json()['conversion_result'];
        }

        return null;
    }
}
