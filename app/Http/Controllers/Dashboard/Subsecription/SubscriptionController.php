<?php

namespace App\Http\Controllers\Dashboard\Subsecription;

use App\Models\Payment;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Subsecription\SubsecriptionRequest;
use App\Http\Requests\Subsecription\SuspendSubsecriptionRequest;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Subscription = Subscription::all();
        return response()->json(['message'=>'Subscription retrieved successfully','Subscription'=>$Subscription]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubsecriptionRequest $request)
    {
        // dd($request);
        $data = $request->validated();

        return DB::transaction(function () use ($data , $request) {

            $subscription = Subscription::create($data);

            $this->create_unpaid_payment($subscription);

            return response()->json(['message'=>'subscription added successfully']);
        });
    }
     /**
     * create unpaid payment
     */

    public function create_unpaid_payment($subscription)
    {
        Payment::create([
            'subscription_id' => $subscription->id,
            // 'user_id'=>Auth::guard('sanctum')->id(),
            'user_id'=>1,
            'price' => $subscription->discount,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SubsecriptionRequest $request , Subscription $subscription )
    {
        // dd($request);
        $data = $request->validated();
        $subscription->update($data);
        return response()->json(['message'=>'subscription updated successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription )
    {
        $subscription->delete();
        return response()->json(['message'=>'subscription deleted successfully']);

    }
    /**
     * accept the specified resource from storage.
     */

    public function accept(Request $request , Subscription $subscription)
    {
        // $this->authorize('accept', $subscription);
        $alreadyChanged = $this->already_change_subscription_status($subscription);
        if ($alreadyChanged) {
            return $alreadyChanged;
        }

        $this->change_subscription_status('active',null,$subscription);
        return response()->json(['message'=>'Subscription accepted successfully']);

    }

    /**
     * reject the specified resource from storage.
     */

    public function reject(Request $request , Subscription $subscription)
    {
        // $this->authorize('reject', $subscription);

        $reason = $request->input('rejection_reason');
        $alreadyChanged = $this->already_change_subscription_status($subscription);
        if ($alreadyChanged) {
            return $alreadyChanged;
        }

        $this->change_subscription_status('rejected',$reason,$subscription);
        return response()->json(['message'=>'Subscription rejected successfully']);
    }

    /**
     * change  the specified resource status.
     */
    public function change_subscription_status ($new_status ,$reason=null, $subscription)
    {
        $subscription->status = $new_status;
        $subscription->rejection_reason = $reason;
        $subscription->save();
    }

    /**
     * check if already changed the specified resource status.
     */
    public function already_change_subscription_status($subscription)
    {
        if($subscription->status != "pending")
        {
            return response()->json(['message'=>'you already accept/reject this subscription']);
        }

    }

     /**
     * renew the Subscription .
     */
    public function renew_the_subscription(Subscription $subscription)
    {
        // $this->middleware('admin');
        return DB::transaction(function () use ($subscription) {

            $subscription->end_date = now();
            $subscription->save();

            $this->create_unpaid_payment($subscription);

            return response()->json(['message'=>'Subscription renewed successfully']);

        });
    }
    /**
     * suspend the Subscription .
     */
    public function suspend(SuspendSubsecriptionRequest $request ,Subscription $subscription)
    {
        $data = $request->validated();
        $subscription->status = 'suspended';
        $subscription->suspension_reason = $data['suspension_reason'];
        $subscription->save();

        return response()->json(['message'=>'Subscription suspended successfully']);

    }

}
