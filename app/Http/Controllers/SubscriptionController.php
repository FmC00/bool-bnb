<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class SubscriptionController extends Controller
{
    public function create(Request $request)
    {
        $plan = Plan::findOrFail($request->get('plan'));

        if($request->user()->subscribedToPlan($plan->braintree_plan, 'main')) {
          return redirect()->route('home');
        }

        $request->user()
            ->newSubscription('main', $plan->braintree_plan)
            ->create($request->payment_method_nonce);

        return redirect()->route('home')->with('success', 'La tua sponsorizzazione è stata inserita correttamente');
    }
}
