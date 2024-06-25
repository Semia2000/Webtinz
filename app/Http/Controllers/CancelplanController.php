<?php

namespace App\Http\Controllers;

use App\Models\Subscriptionplan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Bmatovu\MtnMomo\Products\Collection;
use Bmatovu\MtnMomo\Exceptions\CollectionRequestException;
use Omnipay\Omnipay;
use App\Services\CurrencyConverterService;

class CancelplanController extends Controller
{
    private $gateway;
    private $currencyConverter;   
    
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

        public function paymentcreate(Request $request)
        {
            return view('Upgrade.process-cancelpay');
        }

    public function __construct(CurrencyConverterService $currencyConverter)
    {
        $clientId = config('services.paypal.client_id');
        $clientSecret = config('services.paypal.client_secret');
        $testMode = config('services.paypal.mode') === 'sandbox';

        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId($clientId);
        $this->gateway->setSecret($clientSecret);
        $this->gateway->setTestMode($testMode);
        $this->currencyConverter = $currencyConverter;
    }


    public function processPaypalPayment(Request $request)
    {
        $totalPrice = $request->input('totalPrice');
        $service_id = $request->input('service_id');
        $plan_id = $request->input('plan_id');
        $currency = config('services.paypal.currency');

        // Conversion de la devise
        $totalPriceInUSD = $this->currencyConverter->convert('XOF', $currency, $totalPrice);

        if (!$totalPriceInUSD) {
            return back()->withError('Error: Unable to convert currency');
        }

        try {
            $response = $this->gateway->purchase([
                'amount' => round($totalPriceInUSD, 2),
                'currency' => $currency,
                'returnUrl' => route('payment.success', ['service_id' => $service_id, 'plan_id' => $plan_id]),
                'cancelUrl' => route('payment.error')
            ])->send();

            if ($response->isRedirect()) {
                $response->redirect(); // Redirige l'utilisateur vers PayPal
            } else {
                return $response->getMessage();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    // Paypal get success

    public function success(Request $request, $service_id, $plan_id)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(
                array(
                    'payer_id' => $request->input('PayerID'),
                    'transactionReference' => $request->input('paymentId')
                )
            );
            $currency = config('services.paypal.currency');
            // $service = Service::findOrFail($request->input('service_id'));
            $response = $transaction->send();
            $arr = $response->getData();
            $user = Auth::user();

            if ($response->isSuccessful()) {
                $payment = new Payment();
                $payment->user_id = $user->id;
                $payment->service_id = $service_id;
                $payment->paymentmethod = "Paypal";
                $payment->payment_date = now();
                $payment->payment_id = $arr['id'];
                $payment->partyIdType = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = $currency;
                $payment->status = $arr['state'];

                $payment->save();
                $service = Service::findOrFail($service_id);

                // remplir la table subscription
                $service->start_date = now();
                // Calcule la date de fin en fonction de la durée du plan sélectionné
                $plan = Subscriptionplan::findOrFail($plan_id);
                $service->end_date = now()->addMonths($plan->duration);
                $service->is_pay_done = true;

                $service->save();


                return view('front_include.paysuccessful', compact('service'));

            } else {
                return $response->getMessage();
            }
        } else {
            return 'Payment declined!!';
        }
    }


    // Paypal error get
    public function error()
    {
        return 'User declined the payment!';
    }

    // mtn momo
    public function processMobileMoneyPayment(Request $request)
    {
        $user = Auth::user();
        // $payments = Payment::create([

        // ]);

        $phoneNumber = $request->input('phoneNumber');
        $country = $request->input('country');
        // convertir en euro
        $totalPrice = $request->input('totalPrice');
        $service = Service::findOrFail($request->input('service_id'));
        $totalPriceineuro = $this->currencyConverter->convert('XOF', 'EUR', $totalPrice);

        if (!$totalPriceineuro) {
            return back()->withError('Error: Unable to convert currency');
        }

        $collection = new Collection();

        $referenceId = $collection->requestToPay('yourTransactionId', $phoneNumber, $totalPriceineuro);
        $statustransaction = $collection->getTransactionStatus($referenceId);
        $payment_id = $statustransaction['financialTransactionId'];
        $amount = $statustransaction['amount'];
        $currency = $statustransaction['currency'];
        $partyIdType = $statustransaction['payer']['partyIdType'];
        $phoneNumber = $statustransaction['payer']['partyId'];
        $status = $statustransaction['status'];

        if ($statustransaction['status'] === 'SUCCESSFUL') {
            $payment = Payment::create([
                'user_id' => $user->id,
                'service_id' => $service->id,
                'payment_id' => $payment_id,
                'payment_date' => now(),
                'paymentmethod' => "Mtn Mobile Money",
                'amount' => $amount,
                'currency' => $currency,
                'partyIdType' => $partyIdType,
                'phoneNumber' => $phoneNumber,
                'status' => $status
            ]);

            // remplir la table subscription
            $service->start_date = now();
            // Calcule la date de fin en fonction de la durée du plan sélectionné
            $plan = Subscriptionplan::find($request->input('plan_id'));
            $service->end_date = now()->addMonths($plan->duration);
            $service->is_pay_done = true;

            return view('front_include.paysuccessful', compact('service'));

        } else {
            return redirect()->back()->with('success', 'Payment Not done');
        }
    }

        public function payementmomo()
        {

        }
}
