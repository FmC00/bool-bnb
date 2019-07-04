<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\Apartment;

class SubscriptionController extends Controller
{
    public function create(Request $request)
    {
        $plan = Plan::findOrFail($request->get('plan'));

        $apartment = Apartment::findOrFail($request->apartment_id);

        $apartment
            ->newSubscription('main', $plan->braintree_plan)
            ->create($request->payment_method_nonce);

        return redirect()->route('home')->with('success', 'La tua sponsorizzazione è stata inserita correttamente');
    }
}
