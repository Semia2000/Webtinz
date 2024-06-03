<?php

namespace App\Http\Controllers;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Subscriptionplan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Bmatovu\MtnMomo\Products\Collection;
use Bmatovu\MtnMomo\Exceptions\CollectionRequestException;

class PaymentController extends Controller
{
    //
    public function processMobileMoneyPayment(Request $request)
    {
        $user = Auth::user();
        // $payments = Payment::create([

        // ]);

        $phoneNumber = $request->input('phoneNumber');
        $country = $request->input('country');
        // convertir en euro
        $totalPrice = $request->input('totalPrice');
        $totalPriceineuro = ($totalPrice/655);
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

            if($statustransaction['status'] === 'SUCCESSFUL'){
            $payment = Payment::create([
                'user_id' =>$user->id,
                'service_id' => $service->id,
                'payment_id'=>$payment_id ,
                'payment_date' => now(),
                'paymentmethod' => "Mtn Mobile Money",
                'amount' =>$amount,
                'currency' =>$currency,
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

                return view('front_include.paysuccessful',compact('service'));

            }else{
                return redirect()->back()->with('success','Payment Not done');
            }
    }

    // public function paysuccessful(Request $request)
    // {   
    //     $service_id = $request->input('service_id');
    //     $service = Service::findOrFail($service_id);
    //     $payment = Payment::where('service_id', $service_id)->get();
    //     return view('front_include.paysuccessful',compact('service','payment'));
    // }
}
