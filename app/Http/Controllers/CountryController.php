<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    //
    public function countries()
    {
        $response = Http::get('https://restcountries.com/v3.1/all');

        if ($response->successful()) {
            $countries = $response->json();
            return response()->json($countries);
        } else {
            return response()->json(['error' => 'Erreur lors de la récupération des pays'], $response->status());
        }
    }

    public function states($countryCode)
    {
        $response = Http::get("https://restcountries.com/v3.1/alpha/{$countryCode}");

        if ($response->successful()) {
            $countryData = $response->json();

            // Vérifiez si l'API retourne des subdivisions administratives (states)
            if (isset($countryData['subdivisions'])) {
                $states = $countryData['subdivisions'];
                // Formatage des données pour correspondre au format attendu côté client
                $formattedStates = [];
                foreach ($states as $code => $state) {
                    $formattedStates[] = [
                        'code' => $code,
                        'name' => $state['name']
                    ];
                }
                return response()->json($formattedStates);
            } else {
                return response()->json(['error' => 'Aucune subdivision administrative trouvée pour ce pays'], 404);
            }
        } else {
            return response()->json(['error' => 'Erreur lors de la récupération des données du pays'], $response->status());
        }
    }
}
