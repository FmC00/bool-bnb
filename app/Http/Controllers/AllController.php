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
<<<<<<< HEAD
    function search(Request $request){
      $location = $request -> location;
      $services = Service::all();
      return view('page.search-page', compact('location','services'));
=======

    function search(Request $request) {

      $location = $request -> location;

      // $query = Apartment::query();
      // if($latitude){
      //   $query = $query -> where('latitude', 'LIKE', '%' . $latitude . '%');
      // }
      // if($longitude){
      //   $query = $query -> where('longitude', 'LIKE', '%' . $longitude . '%');
      // }


      return view('page.search-page', compact('location'));
>>>>>>> tomtom
    }
}
