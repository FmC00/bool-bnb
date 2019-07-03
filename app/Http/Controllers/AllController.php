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

      $query = "";

      $lat = $request -> lat;
      $lon = $request -> lon;
      $dist = 20;

      if ($request->distance) {
        $dist = $request->distance;
      }

      $query .= "
        SELECT *
        FROM apartments
        WHERE (3959 * acos(cos(radians('" . $lat . "')) * cos(radians(address_lat)) * cos( radians(address_lon) - radians('" . $lon . "')) + sin(radians('" . $lat . "')) * sin(radians(address_lat)))) < " . $dist
      ;

      if ($request->guests_number) {
        $guests = $request->guests_number;
        $query .= "
          AND guests_number >= " . $guests
        ;
      }

      if ($request->rooms_number) {
        $rooms = $request->rooms_number;
        $query .= "
          AND rooms_number >= " . $rooms
        ;
      }

      $query .= "
        ORDER BY (3959 * acos(cos(radians('" . $lat . "')) * cos(radians(address_lat)) * cos( radians(address_lon) - radians('" . $lon . "')) + sin(radians('" . $lat . "')) * sin(radians(address_lat))))
        LIMIT 0 , 10
      ";

      $apartments = \DB::select($query);

      $services = Service::all();
      return view('page.search-page', compact('location', 'lat', 'lon', 'services', 'apartments'));
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
