<?php

namespace App\Http\Controllers;

use App\Models\Subscriptionplan;
use Illuminate\Http\Request;

class CancelplanController extends Controller
{
        // cancel subscription


        public function confirmCancellation($subscriptionId)
        {
            // Récupérer l'abonnement en fonction de l'ID
            $subscription = Subscriptionplan::findOrFail($subscriptionId);
    
            // Calculer le montant total de l'abonnement sur 18 mois
            $totalSubscriptionFee = $subscription->price * 3; // 3 pour 18 mois (supposant que $subscription->price est pour 6 mois)
    
            // Calculer le nombre de mois écoulés depuis le début de l'abonnement jusqu'à maintenant
            // $startDate = Carbon::parse($subscription->start_date);
            // $monthsPaid = $startDate->diffInMonths(Carbon::now());
    
            // Calculer le montant déjà payé
            $totalPaid = $subscription->price * 1; // Supposant que $subscription->price est pour 6 mois
    
            // Calculer les frais de pénalité
            $penaltyAmount = $totalSubscriptionFee - $totalPaid + ($totalSubscriptionFee * 0.02); // 2% de frais
    
            return view('dashboarduser.cancel', compact('subscription', 'penaltyAmount'));
        }
}
