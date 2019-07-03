@extends('layouts.dashboard-layout')
@section('title', 'Modifica appartamento:')
@section('title_app')
  <span id="title_app"></span>
@stop
@section('right-options')
  {{-- right-options --}}
@stop
@section('content')

  <div class="container mb-4">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    @if (session('success'))
      <div class="alert alert-success">
        <div class="container">
          {{ session('success') }}
        </div>
      </div>
    @endif

    <form action="{{ route('updateApartment', $apartment->id) }}" method="post" enctype="multipart/form-data">

      @csrf
      @method('PUT')

      <div class="container d-flex justify-content-end mt-3">
        {{-- <button class="btn btn-bnb mr-2"><a href="{{ route('myDashboard') }}"><i class="fas fa-arrow-alt-circle-left mr-2"></i>Indietro</a></button> --}}
        <button class="btn btn-bnb"><i class="fas fa-save"></i><input class="btn-form ml-2" type="submit" value="Salva modifiche"></button>
      </div>

      <div class="row">
        <div class="form-group col-12">
          <h2 id="title_app2" class="">Titolo</h3>
          <label for="name">Nome appartamento</label>
          <input id="input_title" type="text" name="name" class="form-control" value="{{ $apartment->name }}">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-12">
          <label for="title">Descrizione</label>
          <textarea name="description" class="form-control" rows="5" value="{{ $apartment->description }}">{{ $apartment->description }}</textarea>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-lg-2 col-sm-12">
          <label for="price">Prezzo</label>
          <input id="input_price" type="number" name="price" value="{{ $apartment->price }}" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-12">
          <label for="geoInput">Indirizzo</label><br>
          <input id="geoInput" class="form-control" type="text" name="" placeholder="Inserisci l'indirizzo" value="">
          <div class="w-100">
            <div class="suggest-list d-flex flex-column align-items-center w-100 text-secondary bg-white mx-auto">
            </div>
          </div>
          <input id="lat" type="hidden" name="address_lat" value="{{ $apartment->address_lat }}">
          <input id="lon" type="hidden" name="address_lon" value="{{ $apartment->address_lon }}">
        </div>
      </div>
      <div class="row my-4">
        <div class="col-12">
          <h3>Caratteristiche</h3>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="form-group col-3">
              <label for="area_sm">Dimensioni</label>
              <input type="number" name="area_sm" value="{{ $apartment->area_sm }}" class="form-control">
            </div>
            <div class="form-group col-3">
              <label for="rooms_number">Stanze</label>
              <input type="number" name="rooms_number" value="{{ $apartment->rooms_number }}" class="form-control">
            </div>
            <div class="form-group col-3">
              <label for="guests_number">Ospiti</label>
              <input type="number" name="guests_number" value="{{ $apartment->guests_number }}" class="form-control">
            </div>
            <div class="form-group col-3">
              <label for="bathrooms">Bagni</label>
              <input type="number" name="bathrooms" value="{{ $apartment->bathrooms }}" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="row my-4">
        <div class="col-12">
          <h3>Servizi</h3>
        </div>
        <div class="col-12 mt-3">
          <div class="row">
            @foreach($services as $service)
              <div class="form-group col-2">
                <input id="{{ $service->name }}" type="checkbox" name="service[]" value="{{ $service->id }}"

                @foreach ($apartment->services as $ap_service)
                  @if ($service->id == $ap_service->id)
                    checked
                  @endif
                @endforeach

                >
                <label for="{{ $service->name }}">{{ $service->name }}</label>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="">
            <p>Aggiungi una foto del tuo appartamento:</p>
            {{-- <form id="formImgUpload" class="" action="{{route('image.add')}}" method="post" enctype="multipart/form-data"> --}}
              <input type="file" name="image" id="image" value="">
          </div>
        </div>
      </div>
    </form>
  </div>
@stop
