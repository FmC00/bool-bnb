<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apartment;
use App\Service;

class AllController extends Controller
{
    function showHome() {

      $apartments = Apartment::all();

      return view('page.home-mockup', compact('apartments'));
    }
    function search(Request $request){
      $location = $request -> location;
      $services = Service::all();
      return view('page.search-page', compact('location','services'));
    }
}
