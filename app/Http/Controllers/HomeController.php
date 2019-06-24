<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Apartment;
use App\Service;

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
      return view('page.dashboard');
    }

    public function create()
    {
      $apartments = Apartment::all();
      $services = Service::all();

      return view('pages.', compact('apartments', 'services'));
    }

    public function store(Request $request)
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

      $apartments = Apartment::create($validateData);
      $services = Service::find($validateData['service']);
      $apartments->services()->attach($services);
      return redirect('/');
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
      return redirect('/');
    }
}
