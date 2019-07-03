<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Plan;
use App\Apartment;

class PlanController extends Controller
{
    public function index(Request $request, $id)
    {
      $plans = Plan::all();
      $apartment = Apartment::findOrFail($id);

      return view('plans.index', compact('plans', 'apartment'));
    }

    public function show(Plan $plan, Request $request, $id)
    {
      return view('plans.show', compact('plan', 'id'));
    }
}
