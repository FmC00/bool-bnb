@extends('layouts.dashboard-layout')
@section('title', 'I miei appartamenti')
@section('right-options')
@stop
@section('content')

  <div id="apartments-container" class="w-100 d-flex flex-wrap ml-0 ml-md-4 justify-content-center justify-content-md-start">

     @foreach (Auth::user()->apartments as $apartment)
       <div class="m-2 card-apartment">
         {{-- <p>Visit Count: {{ $apartment->visit_count }}</p> --}}
         <a href="{{ route('detailApartment', $apartment->id) }}" style="color:black;">
           <apartment-card
            title = '{{ $apartment->name }}'
            price = '{{ $apartment->price }}'
            guests = '{{ $apartment->guests_number }}'
            image = '../images/{{$apartment->image}}' class="m-0">
           </apartment-card>
         </a>
         <div class="d-flex justify-content-center mb-3" style="height:28px;">
           <button class="btn btn-bnb ml-2"><a href="{{route('detailApartment', $apartment->id)}}"><i class="fas fa-info-circle"></i></a></button>
           <button class="btn btn-bnb ml-2"><a href="{{route('editApartment', $apartment->id)}}"><i class="fas fa-edit"></i></a></button>
           <form class="" action="{{ route('destroyApartment', $apartment->id) }}" method="post">
             @csrf
             @method('DELETE')
             <button class="btn btn-bnb ml-2"><input class="d-none" type="submit" name="" value=""><i class="fas fa-trash-alt"></i></button>
           </form>
           <button class="btn btn-bnb ml-2"><a href="{{ route('plans.index') }}"><i class="fas fa-bullhorn"></i></a></button>
           {{-- <button class="btn btn-bnb ml-2"><a href="{{ route('statsApartment',$apartment->id)}}"><i class="fas fa-chart-line"></i></a></button> --}}
           {{-- <form class="" action="{{route('statsApartment')}}" method="get">
             <input type="hidden" name="apartmentid" value="{{ $apartment->id}}">
             <button type="submit" class="btn btn-bnb ml-2"><i class="fas fa-chart-line"></i></a></button>
           </form> --}}
           {{-- <button class="btn btn-bnb ml-2"><a href="{{ route('messagesApartment') }}"><i class="fas fa-envelope"></i></a></button> --}}
         </div>
       </div>
     @endforeach
   </div>


@stop
