<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apartment;

class AllController extends Controller
{
    function showHome() {

      $apartments = Apartment::all();

      return view('page.home-mockup', compact('apartments'));
    }
}
