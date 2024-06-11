<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CurrencyConverterService;

class CurrencyController extends Controller
{

    private $currencyConverter;

    public function __construct(CurrencyConverterService $currencyConverter)
    {
        $this->currencyConverter = $currencyConverter;
    }

    public function convertCurrency(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $amount = $request->get('amount');

        $convertedAmount = $this->currencyConverter->convert($from, $to, $amount);

        if ($convertedAmount) {
            return response()->json(['convertedAmount' => $convertedAmount]);
        }

        return response()->json(['error' => 'Conversion failed'], 400);
    }

}
