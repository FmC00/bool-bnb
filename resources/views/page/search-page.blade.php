@extends('layouts.home-layout')
@section('content')
  <div id="search-page-container" class="container-fluid">
    <form action="{{route('search')}}" method="get">
      @csrf
      <div class="row">
        <div class="w-md-50 w-75 mx-auto">
          <div class="w-100 d-flex flex-column align-items-center justify-content-center my-3">
            <input id="geoInput" class="custom w-100 text-secondary p-1 pl-4" type="text" name="location" placeholder="Cerca alloggi nella città che preferisci" value="{{ $location }}">
            <div id="suggest-box" class="w-100">
              <div class="w-md-50 w-75 suggest-list d-flex flex-column align-items-center text-secondary bg-white mx-auto">
              </div>
            </div>
            <input id="lat" type="hidden" name="lat" value="{{ $lat }}">
            <input id="lon" type="hidden" name="lon" value="{{ $lon }}">
          </div>
        </div>
      </div>
      <div class="row">
        <div id="filter-apartments-container" class="col-12 d-flex justify-content-center">
          <div id="filter-apartments-box" class="w-75 rounded my-4 bg-white">
            <div class="w-100 text-center bg-primary text-white">
              <p>Non trovi quello che cerchi? Filtra i tuoi risultati</p>
            </div>
            <div class="w-100 d-flex flex-wrap justify-content-center align-items-center text-center">
              <div class="form-group">
                <label for="guests_number">In quanti siete?</label>
                <input class="form-control" type="number" name="guests_number">
              </div>
            </div>
            <div class="w-100 d-flex flex-wrap justify-content-center align-items-center">
              <div class="form-group">
                <label for="rooms_number">Dicci il numero di stanze del tuo appatamento ideale</label>
                <input class="form-control" type="number" name="rooms_number">
              </div>
            </div>
            <div class="w-100 d-flex flex-wrap justify-content-center align-items-center">
              <div class="form-group">
                <label for="rooms_number">A quanti chilometri di distanza possiamo cercare?</label>
                <input class="form-control" type="number" name="distance">
              </div>
            </div>
            <div class="w-100 text-center my-3">
              <button class="btn btn-bnb mt-3" type="submit" name="button">
                Cerca il mio appartamento!
                <svg viewBox="0 0 1000 1000" role="presentation" aria-hidden="true" focusable="false" style="height:34px; width:34px; fill: white;">
                  <path d="m499.3 736.7c-51-64-81-120.1-91-168.1-10-39-6-70 11-93 18-27 45-40 80-40s62 13 80 40c17 23 21 54 11 93-11 49-41 105-91 168.1zm362.2 43c-7 47-39 86-83 105-85 37-169.1-22-241.1-102 119.1-149.1 141.1-265.1 90-340.2-30-43-73-64-128.1-64-111 0-172.1 94-148.1 203.1 14 59 51 126.1 110 201.1-37 41-72 70-103 88-24 13-47 21-69 23-101 15-180.1-83-144.1-184.1 5-13 15-37 32-74l1-2c55-120.1 122.1-256.1 199.1-407.2l2-5 22-42c17-31 24-45 51-62 13-8 29-12 47-12 36 0 64 21 76 38 6 9 13 21 22 36l21 41 3 6c77 151.1 144.1 287.1 199.1 407.2l1 1 20 46 12 29c9.2 23.1 11.2 46.1 8.2 70.1zm46-90.1c-7-22-19-48-34-79v-1c-71-151.1-137.1-287.1-200.1-409.2l-4-6c-45-92-77-147.1-170.1-147.1-92 0-131.1 64-171.1 147.1l-3 6c-63 122.1-129.1 258.1-200.1 409.2v2l-21 46c-8 19-12 29-13 32-51 140.1 54 263.1 181.1 263.1 1 0 5 0 10-1h14c66-8 134.1-50 203.1-125.1 69 75 137.1 117.1 203.1 125.1h14c5 1 9 1 10 1 127.1.1 232.1-123 181.1-263.1z">
                  </path>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div class="row">
      <div id="apartments-container" class="col-12">
        <div class="col-12 mb-5">
          <h1 class="d-flex justify-content-center justify-content-md-start pt-5">Sponsorizzati dai nostri host</h1>
        </div>
        {{-- card appartamento singolo (Vue component)--}}
        <div class="w-100 d-flex flex-wrap justify-content-center">
          @foreach ($sponsors as $sponsor)
              <a href="{{ route('detailsApartment', $sponsor->apartment->id) }}" style="color:blue;">
                <div class="card-apartment p-1 m-3">
                  <apartment-card
                  title = '{{ $sponsor->apartment->name }}'
                  price = '{{ $sponsor->apartment->price }}'
                  guests = '{{ $sponsor->apartment->guests_number }}'
                  image = '../images/{{$sponsor->apartment->image}}' class="m-0">
                </apartment-card>
                </div>
              </a>
          @endforeach
        </div>
        <div class="col-12 mb-5">
          <h1 class="d-flex justify-content-center justify-content-md-start pt-5">Alloggi in tutto il mondo</h1>
        </div>
        <div class="w-100 d-flex flex-wrap justify-content-center">
          {{-- card appartamento singolo (Vue component)--}}
          @foreach ($apartments as $apartment)
            <a href="{{ route('detailsApartment', $apartment->id) }}" style="color:black;">
              <div class="card-apartment p-1 m-3">
                <apartment-card
                title = '{{ $apartment->name }}'
                price = '{{ $apartment->price }}'
                guests = '{{ $apartment->guests_number }}'
                image = '../images/{{$apartment->image}}' class="m-0">
              </apartment-card>
            </div>
          </a>
        @endforeach
        </div>
      </div>
    </div>
  </div>
@stop
