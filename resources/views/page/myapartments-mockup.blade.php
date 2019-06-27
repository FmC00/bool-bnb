@extends('layouts.dashboard-layout')
@section('content')
  <div class="mr-4 ml-5">
    <div class="d-flex justify-content-between">
      <h4 class="mt-4">
        <span class="h-100 mr-3">
           <svg viewBox="0 0 1000 1000" role="presentation" aria-hidden="true" focusable="false" style="height:34px; width:34px; fill: #ee555d;"><path d="m499.3 736.7c-51-64-81-120.1-91-168.1-10-39-6-70 11-93 18-27 45-40 80-40s62 13 80 40c17 23 21 54 11 93-11 49-41 105-91 168.1zm362.2 43c-7 47-39 86-83 105-85 37-169.1-22-241.1-102 119.1-149.1 141.1-265.1 90-340.2-30-43-73-64-128.1-64-111 0-172.1 94-148.1 203.1 14 59 51 126.1 110 201.1-37 41-72 70-103 88-24 13-47 21-69 23-101 15-180.1-83-144.1-184.1 5-13 15-37 32-74l1-2c55-120.1 122.1-256.1 199.1-407.2l2-5 22-42c17-31 24-45 51-62 13-8 29-12 47-12 36 0 64 21 76 38 6 9 13 21 22 36l21 41 3 6c77 151.1 144.1 287.1 199.1 407.2l1 1 20 46 12 29c9.2 23.1 11.2 46.1 8.2 70.1zm46-90.1c-7-22-19-48-34-79v-1c-71-151.1-137.1-287.1-200.1-409.2l-4-6c-45-92-77-147.1-170.1-147.1-92 0-131.1 64-171.1 147.1l-3 6c-63 122.1-129.1 258.1-200.1 409.2v2l-21 46c-8 19-12 29-13 32-51 140.1 54 263.1 181.1 263.1 1 0 5 0 10-1h14c66-8 134.1-50 203.1-125.1 69 75 137.1 117.1 203.1 125.1h14c5 1 9 1 10 1 127.1.1 232.1-123 181.1-263.1z">
           </path>
           </svg>
         </span>
         I miei appartamenti
      </h4>

      <form class="search-form" action="" method="post">
        <div class="search-container mt-4">
          <input type="text" name="search-text" class="search-input" placeholder="Cerca uno o più appartamenti"/>
          <button class="submit"><i class="fas fa-search"></i></button>
          <img src="" alt="" class="user-img-dashboard">
        </div>
      </form>
    </div>


    <hr id="hr-all-apartments" class="w-100 ml-0">
     <div id="apartments-container" class="w-100 d-flex flex-wrap ml-4">

        @foreach (Auth::user()->apartments as $apartment)
          <div class="m-2 card-apartment">
            <apartment-card
             title = '{{ $apartment->name }}'
             image = 'https://www.kettler.com/assets/images/AcadiaPoolNEW.jpg'
             location = 'Roma, Italia' class="m-0">
            </apartment-card>

            <div class="d-flex justify-content-center mb-3">
              <button class="btn btn-bnb ml-2"><a href="{{ route('detailApartment') }}"><i class="fas fa-info-circle"></i></a></button>
              <button class="btn btn-bnb ml-2"><a href="{{ route('sponsorApartment') }}"><i class="fas fa-bullhorn"></i></a></button>
              <button class="btn btn-bnb ml-2"><a href="{{ route('statsApartment') }}"><i class="fas fa-chart-line"></i></a></button>
              <button class="btn btn-bnb ml-2"><a href="#"><i class="fas fa-envelope"></i></a></button>
              <button class="btn btn-bnb ml-2"><a href="{{ route('destroyApartment') }}"><i class="fas fa-trash-alt"></i></a></button>
            </div>
          </div>
        @endforeach
      </div>
  </div>
@endsection
