@extends('layouts.dashboard-layout')
@section('title', 'Inserisci nuovo appartamento:')
@section('title_app')
  <span id="title_app"></span>
@stop
@section('right-options')
  {{-- right-options --}}
@stop
@section('content')

  <div class="container">
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

    <form action="{{ route('storeApartment') }}" method="post" enctype="multipart/form-data">

      @csrf
      <div class="container d-flex justify-content-end mt-3">
        {{-- <button class="btn btn-bnb mr-2"><a href="{{ route('myDashboard') }}"><i class="fas fa-arrow-alt-circle-left mr-2"></i>Indietro</a></button> --}}
        <button class="btn btn-bnb"><i class="fas fa-save"></i><input class="btn-form ml-2" type="submit" value="Salva annuncio"></button>
      </div>

      <div class="row">
        <div class="form-group col-12">
          <h2 id="title_app2" class="">Titolo</h3>
            <label for="name">Nome appartamento</label>
            <input id="input_title" type="text" name="name" class="form-control" placeholder="Inserisci il nome dell'appartamento">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-12">
          <label for="title">Descrizione</label>
          <textarea name="description" class="form-control"></textarea>
        </div>
      </div>

        {{-- <div class="row">
        <div class="col-12">
        <label>Immagine</label>
        <div class="custom-file mb-3">
        <label for="image" class="custom-file-label">Immagine</label>
        <input type="file" name="image" id="image" class="custom-file-input">
      </div>
    </div>
  </div> --}}

      <div class="row">
        <div class="form-group col-lg-2 col-sm-12 mt-3">
          <label for="price">Prezzo</label>
          <input id="input_price" type="number" name="price" placeholder="Es. 50.00" class="form-control">
        </div>
      </div>

  {{-- <div class="row">
  <div class="form-group mt-5 col-12">
  <h3 class="">Inserisci l'indirizzo completo</h3>
  <label for="address">Indirizzo</label>
  <input type="text" id="address_apartment" name="address" class="form-control" placeholder="es. Piazzale Giovanni dalle Bande Nere, 9, 20146, Milano, MI, Italia">
</div>
<div class="form-group col-12">
<label>Mappa</label>
<input type="text" id="address_apartment" name="address" class="form-control" placeholder="MAPPA">
</div>
</div> --}}

      <div class="row mt-5 mb-5">
        <div class="col-12">
          <h3>Caratteristiche</h3>
        </div>
        <div class="col-12">
          <div class="row">
            <div class="form-group col-3">
              <label for="area_sm">Dimensioni</label>
              <input type="number" name="area_sm" placeholder="Inserisci mq" class="form-control">
            </div>
            <div class="form-group col-3">
              <label for="rooms_number">Stanze</label>
              <input type="number" name="rooms_number" placeholder="Inserisci il n. di stanze" class="form-control">
            </div>
            <div class="form-group col-3">
              <label for="guests_number">Ospiti</label>
              <input type="number" name="guests_number" placeholder="Inserisci il n. di ospiti" class="form-control">
            </div>
            <div class="form-group col-3">
              <label for="bathrooms">Bagni</label>
              <input type="number" name="bathrooms" placeholder="Inserisci il n. di bagni" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5 mb-5">
        <div class="col-12">
          <h3>Servizi</h3>
        </div>
        <div class="col-12">
          <div class="row">
            @foreach($services as $service)
              <div class="form-group col-2">
                <input id="{{ $service->name }}" type="checkbox" name="service[]" value="{{ $service->id }}">
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

{{-- <div class="row">
  <div class="col-12">
    <div class="">
      <p>Aggiungi una foto del tuo appartamento:</p>
      <form id="formImgUpload" class="" action="{{route('image.add')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="file" name="image" id="image" value="">
        <input type="submit">
      </form>
    </div>
  </div>
</div> --}}

@stop
