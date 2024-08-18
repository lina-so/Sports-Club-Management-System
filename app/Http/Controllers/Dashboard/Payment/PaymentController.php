<?php

namespace App\Http\Controllers\Dashboard\Payment;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaidPaymentRequest;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaidPaymentRequest $request , $subscription_id)
    {
        $data = $request->validated();
        $payment = Payment::where('subscription_id',$subscription_id)->first();
        $payment->update([
            'date_of_pay'=>now(),
            'payment_method'=>$data['payment_method'],
            'status'=>'paid',

        ]);

    }


}
