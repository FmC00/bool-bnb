<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
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

    public function detailApartment($id)
    {
      $apartment = Apartment::findOrFail($id);
      return view('page.detail-apartment-mockup', compact('apartment'));
    }

    public function detailsApartment(Request $request)
    {
      $id = $request->get('apartmentid');

      $apartment = Apartment::findOrFail($id);
      return view('page.details-apartment-page',compact('apartment'));
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
        'address_lat' => 'required',
        'address_lon'=> 'required',
        'service' => ''
      ]);

      $image = $request->file('image');
      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
      $destinationPath = public_path('/images');
      $image->move($destinationPath, $input['imagename']);

      $apartment = Apartment::make($validateData);
      $apartment->user_id = Auth::user()->id;
      $apartment->image = $input['imagename'];

      $apartment->save();

      $services = Service::find($validateData['service']);
      $apartment->services()->attach($services);
      return redirect('/myDashboard');
    }

    public function sponsorApartment()
    {
      return view('page.sponsor-apartment-mockup');
    }

    public function statsApartment(Request $request)
    {
      $apartments = \Auth::user()->apartments;
      $messages = \Auth::user()->messages;

      return view('page.stats-apartment-mockup', compact('apartments', 'messages'));
    }

    public function messagesApartment()
    {
      $user_id = Auth::user()->id;
      $messages = User::findOrFail($user_id)->messages()->orderByDesc('created_at')->get();

      return view('page.sms', compact('messages'));
    }

    public function editApartment($id)
    {
      $apartment = Apartment::findOrFail($id);
      $services = Service::all();

      return view('page.edit-apartment', compact('apartment', 'services'));
    }

    public function update(Request $request, $id)
    {
      $validateData = $request->validate([

        'name'=> 'required',
        'description' => 'required',
        'price' => 'required',
        'rooms_number'=> 'required',
        'guests_number'=> 'required',
        'bathrooms'=> 'required',
        'area_sm'=> 'required',
        'address_lat' => 'required',
        'address_lon'=> 'required',
        'service' => ''
      ]);

      $apartment = Apartment::findOrFail(intval($id));

      $apartment->update($validateData);
      $services = Service::find($validateData['service']);
      $apartment->services()->sync($services);

      $apartment = Apartment::findOrFail(intval($id));

      if ($request->image) {
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);

        $apartment->image = $input['imagename'];
        $apartment->save();
      }

      return redirect('/myDashboard');
    }

    public function updateVisit(Request $request, $id) {

      $apartment = Apartment::findOrFail(intval($id));

      // $visitCount = $request->visitCount;
      // $apartment->visit_count = $visitCount;
      $apartment->visit_count += 1;

      $apartment->save();
    }

    public function destroy($id)
    {
      $apartments = Apartment::findOrFail($id);
      $apartments->services()->detach();
      $apartments->delete();
      return redirect('/myDashboard');
    }
    // public function fileUpload(Request $request)
    // {
    //   $image = $request->file('image');
    //   $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
    //   $destinationPath = public_path('/images');
    //   $image->move($destinationPath, $input['imagename']);
    //   return redirect('/addApartment');
    // }
}
