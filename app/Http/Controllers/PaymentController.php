<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Service;
use App\Models\Subscriptionplan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Bmatovu\MtnMomo\Products\Collection;
use Bmatovu\MtnMomo\Exceptions\CollectionRequestException;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    //

    // Paypal payment
    private $gateway;

    public function __construct()
    {
        $clientId = config('services.paypal.client_id');
        $clientSecret = config('services.paypal.client_secret');
        $testMode = config('services.paypal.mode') === 'sandbox';

        // dd($clientId,$clientSecret,$testMode);
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId($clientId);
        $this->gateway->setSecret($clientSecret);
        $this->gateway->setTestMode($testMode);
    }



    public function processPaypalPayment(Request $request)
    {

        $totalPrice = $request->input('totalPrice');
        $totalPriceinusd = round(($totalPrice / 601), 2);
        $service = Service::findOrFail($request->input('service_id'));
        $currency = config('services.paypal.currency');
        try {

            $response = $this->gateway->purchase(array(
                'amount' =>$totalPriceinusd ,
                'currency' => $currency,
                'returnUrl' => route('payment.success'),
                'cancelUrl' => route('payment.error')
            ))->send();


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

    public function success(Request $request)
    {
        $service = Service::findOrFail($request->input('service_id'));

        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(
                array(
                    'payer_id' => $request->input('PayerID'),
                    'transactionReference' => $request->input('paymentId')
                )
            );

            $response = $transaction->send();
            dd($response);

            return "Payment is Successfull.  " ;

            // if ($response->isSuccessful()) {

            //     $arr = $response->getData();

            //     $user = Auth::user();

            //     $payment = new Payment();
            //     $payment->user_id = $user->id;
            //     $payment->paymentmethod = "Paypal";
            //     $payment->payment_date = now();
            //     $payment->payment_id = $arr['id'];
            //     $payment->partyIdType = $arr['payer']['payer_info']['email'];
            //     $payment->amount = $arr['transactions'][0]['amount']['total'];
            //     $payment->currency = env('PAYPAL_CURRENCY');
            //     $payment->status = $arr['state'];

            //     dd($payment);

            //     $payment->save();

            //     return "Payment is Successfull. Your Transaction Id is : " . $arr['id'];

            // } else {
            //     return $response->getMessage();
            // }
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
        $totalPriceineuro = ($totalPrice / 655);
        $service = Service::findOrFail($request->input('service_id'));

        // // Logic for processing Mobile Money payment
        // // This would typically involve calling an API for the Mobile Money provider

        // try {
        //     // Example logic for payment processing
        //     // Replace with actual payment processing logic
        //     $paymentResult = $this->processPaymentWithProvider($phoneNumber, $country, $totalPrice);

        //     if ($paymentResult['status'] == 'success') {
        //         return response()->json(['success' => true]);
        //     } else {
        //         return response()->json(['success' => false, 'message' => $paymentResult['message']]);
        //     }
        // } catch (\Exception $e) {
        //     return response()->json(['success' => false, 'message' => $e->getMessage()]);
        // }
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



}


