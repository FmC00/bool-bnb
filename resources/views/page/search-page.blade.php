@extends('layouts.home-layout')
@section('content')
  <div id="search-page-container" class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h1>Appartamenti a {{ $location }}</h1>
      </div>
        <div id="apartments-container" class="col-12 d-flex flex-wrap justify-content-center justify-content-md-start">
          {{-- card appartamento singolo (Vue component)--}}
          @for ($i=0; $i < 10; $i++)
            <apartment-card
            title = ciao
            image = 'https://www.kettler.com/assets/images/AcadiaPoolNEW.jpg'
            location = 'Roma, Italia'>
          </apartment-card>
          @endfor
          {{-- fine card appartamento singolo --}}
        </div>
      </div>
    </div>
  </div>
@stop
