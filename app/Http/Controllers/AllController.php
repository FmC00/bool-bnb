<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apartment;
use App\Service;

class AllController extends Controller
{
    function showHome() {

      $apartments = Apartment::all();

      return view('page.homepage', compact('apartments'));
    }

    function search(Request $request){
      $location = $request -> location;
      $lat = $request -> lat;
      $lon = $request -> lon;

      // $apartments = QUERY

      $services = Service::all();
      return view('page.search-page', compact('location','services', 'apartments'));
    }

    public function storeMessage(Request $request)
    {

      $validateData = $request->validate([

        'mail' => 'required',
        'name'=> 'required',
        'content' => 'required',
        'apartment_id' => 'required'

      ]);

      $message = Message::make($validateData);
      $message->user_id = Apartment::findOrFail($validateData['apartment_id'])->user;

      $message->save();

      return redirect('/');
    }

}
