<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apartment;
use App\Service;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function myDashboard()
    {
      return view('page.myapartments-mockup');
    }

    public function addApartment()
    {
      $services = Service::all();

      return view('page.add-apartment-mockup', compact('services'));
    }

    public function detailApartment()
    {
      return view('page.detail-apartment-mockup');
    }

    public function detailsApartment()
    {
      return view('page.details-apartment-page');
    }

    public function store(Request $request)
    {

      $validateData = $request->validate([

        'name'=> 'required',
        'description' => 'required',
        'price' => 'required',
        'rooms_number'=> 'required',
        'guests_number'=> 'required',
        'bathrooms'=> 'required',
        'area_sm'=> 'required',
        'address_lat' => '',
        'address_lon'=> '',
        'image' => '',
        'service' => ''
      ]);

      $apartment = Apartment::make($validateData);
      $apartment->user_id = Auth::user()->id;
      $apartment->address_lat = 35;
      $apartment->address_lon = 35;
      $apartment->image = "image";

      $apartment ->save();

      $services = Service::find($validateData['service']);
      $apartment->services()->attach($services);
      return redirect('/myDashboard');
    }

    public function sponsorApartment()
    {
      return view('page.sponsor-apartment-mockup');
    }

    public function statsApartment()
    {
      return view('page.stats-apartment-mockup');
    }

    public function messagesApartment()
    {
      return view('page.sms');
    }

    public function edit($id)
    {
      $apartments = Apartment::findOrFail($id);
      $services = Service::all();

      return view('pages.editPost', compact('apartment', 'services'));
    }

    public function update(Request $request, $id)
    {
      $validateData = $request->validate([

        'user_id'=> 'required',
        'name'=> 'required',
        'description' => 'required',
        'rooms_number'=> 'required',
        'guests_number'=> 'required',
        'bathrooms'=> 'required',
        'area_sm'=> 'required',
        'address_lat' => 'required',
        'address_lon'=> 'required',
        'image' => 'required'
      ]);

      $apartments = Apartment::find(intval($id));
      $apartments->update($validateData);
      $services = Service::find($validateData['service']);
      $apartments->services()->sync($services);
      return redirect('/');
    }

    public function destroy($id)
    {
      $apartments = Apartment::findOrFail($id);
      $apartments->services()->detach();
      $apartments->delete();
      return redirect('/myDashboard');
    }
}
