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
    function search(Request $request){
      $location = $request -> location;

      // capire come convertire la stringa in lat e long

      // $query = Apartment::query();
      // if($latitude){
      //   $query = $query -> where('latitude', 'LIKE', '%' . $latitude . '%');
      // }
      // if($longitude){
      //   $query = $query -> where('longitude', 'LIKE', '%' . $longitude . '%');
      // }


      return view('page.search-page', compact('$location'));
    }
}
