<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apartment;
use App\Service;
use App\Message;

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
        'user_id' => 'required',
        'apartment_id' => 'required'

      ]);

      $message = Message::make($validateData);
      $apartment = Apartment::findOrFail($validateData['apartment_id']);
      $message->content .= ' (messaggio per appartamento: ' . $apartment->name . ')';

      $message->save();

      return redirect('/');
    }

    public function detailsApartment($id)
    {
      $apartment = Apartment::findOrFail($id);
      return view('page.details-apartment-page', compact('apartment'));
    }

}
