@extends('layouts.dashboard-layout')
@section('title', 'I miei appartamenti')
@section('right-options')
  <input type="text" name="search-text" class="search-input" placeholder="Cerca uno o più appartamenti"/>
  <button class="submit"><i class="fas fa-search"></i></button>

@stop
@section('content')

  <div id="apartments-container" class="w-100 d-flex flex-wrap ml-4">

     @foreach (Auth::user()->apartments as $apartment)
       <div class="m-2 card-apartment">
         <a href="{{ route('detailsApartment') }}" style="color:black;">
           <apartment-card
            title = '{{ $apartment->name }}'
            image = 'https://www.kettler.com/assets/images/AcadiaPoolNEW.jpg'
            location = 'Roma, Italia' class="m-0">
           </apartment-card>
         </a>

         <div class="d-flex justify-content-center mb-3" style="height:28px;">
           <button class="btn btn-bnb ml-2"><a href="{{ route('detailsApartment') }}"><i class="fas fa-info-circle"></i></a></button>
           <button class="btn btn-bnb ml-2"><a href="{{ route('sponsorApartment') }}"><i class="fas fa-bullhorn"></i></a></button>
           <button class="btn btn-bnb ml-2"><a href="{{ route('statsApartment') }}"><i class="fas fa-chart-line"></i></a></button>
           <button class="btn btn-bnb ml-2"><a href="{{ route('messagesApartment') }}"><i class="fas fa-envelope"></i></a></button>

           <form class="" action="{{ route('destroyApartment', $apartment->id) }}" method="post">
             @csrf
             @method('DELETE')
             <button class="btn btn-bnb ml-2"><input class="d-none" type="submit" name="" value=""><i class="fas fa-trash-alt"></i></button>
           </form>

         </div>
       </div>
     @endforeach
   </div>


@stop
