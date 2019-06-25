@extends('layouts.dashboard-layout')
@section('content')
  <div class="mr-4 ml-5">
    <h4 class="mt-4 w-100">
      <span class="h-100 mr-3">
         <svg viewBox="0 0 1000 1000" role="presentation" aria-hidden="true" focusable="false" style="height:34px; width:34px; fill: #ee555d;"><path d="m499.3 736.7c-51-64-81-120.1-91-168.1-10-39-6-70 11-93 18-27 45-40 80-40s62 13 80 40c17 23 21 54 11 93-11 49-41 105-91 168.1zm362.2 43c-7 47-39 86-83 105-85 37-169.1-22-241.1-102 119.1-149.1 141.1-265.1 90-340.2-30-43-73-64-128.1-64-111 0-172.1 94-148.1 203.1 14 59 51 126.1 110 201.1-37 41-72 70-103 88-24 13-47 21-69 23-101 15-180.1-83-144.1-184.1 5-13 15-37 32-74l1-2c55-120.1 122.1-256.1 199.1-407.2l2-5 22-42c17-31 24-45 51-62 13-8 29-12 47-12 36 0 64 21 76 38 6 9 13 21 22 36l21 41 3 6c77 151.1 144.1 287.1 199.1 407.2l1 1 20 46 12 29c9.2 23.1 11.2 46.1 8.2 70.1zm46-90.1c-7-22-19-48-34-79v-1c-71-151.1-137.1-287.1-200.1-409.2l-4-6c-45-92-77-147.1-170.1-147.1-92 0-131.1 64-171.1 147.1l-3 6c-63 122.1-129.1 258.1-200.1 409.2v2l-21 46c-8 19-12 29-13 32-51 140.1 54 263.1 181.1 263.1 1 0 5 0 10-1h14c66-8 134.1-50 203.1-125.1 69 75 137.1 117.1 203.1 125.1h14c5 1 9 1 10 1 127.1.1 232.1-123 181.1-263.1z">
         </path>
         </svg>
       </span>
       Inserisci nuovo appartamento
     </h4>
    <hr class="w-100 ml-0">

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

      <form action="{{ route('storeApartment') }}" method="post">

        @csrf
        <button class="btn btn-bnb mr-2"><a href="{{ route('myDashboard') }}"><i class="fas fa-arrow-alt-circle-left mr-2"></i>Indietro</a></button>
        <button class="btn btn-bnb"><i class="fas fa-save"></i><input class="btn-form ml-2" type="submit" value="Salva annuncio"></button>

        <div class="row">
            <div class="form-group mt-5 col-12">
                <h2 class="">Titolo</h3>
                <label for="name">Nome appartamento</label>
                <input type="text" name="name" class="form-control" placeholder="Inserisci il nome dell'appartamento">
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
                <input type="number" name="price" placeholder="es. 50.00" class="form-control">
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

        <div class="form-group">
          <h3>Servizi</h3>
          @foreach($services as $service)
            <div>
              <input id="{{ $service->name }}" type="checkbox" name="service[]" value="{{ $service->id }}">
              <label for="{{ $service->name }}">{{ $service->name }}</label>
            </div>
          @endforeach
        </div>


      </form>
    </div>

  </div>
@endsection