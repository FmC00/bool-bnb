@extends('layouts.home-layout')
@section('content')

    <script type="text/javascript">

      setTimeout(function() {
        $.ajax({
          url: '{{ route('updateVisit', $apartment->id) }}',
          method: 'PUT',
          // data: $formVar.serialize(),
          headers: {
            'X-CSRF-Token': '{{ csrf_token() }}'
          }
        });
      }, 1000);
    </script>

    <div class="container-fluid">
      <div class="container p-3 d-flex justify-content-between">
        <img class="rounded" src="../images/{{ $apartment->image }}" style="height: 300px; width:500px;">
        <div class="container d-flex align-items-center justify-content-end">
          <h1 class="">{{ $apartment->name }}</h1>
        </div>
      </div>
      <div>
        <div class="container">
          <div class="row mt-5">
            <div class="col-lg-8 col-xs-12">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <div>
                      <h3>Descrizione</h3>
                      <p>{{ $apartment->description }}</p>
                    </div>
                    <div>
                      <h3>Indirizzo</h3>
                      <div id="geoReverse">
                        <span class="lat d-none">{{ $apartment->address_lat}}</span>
                        <span class="lon d-none">{{ $apartment->address_lon}}</span>
                        <p class="address"></p>
                      </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <div>
                      <h3>Mappa</h3>
                      <div id="map" class="map" style="height:300px; width: 500px"></div>
                      <script type="text/javascript">
                        var map = new ol.Map({
                          target: 'map',
                          layers: [
                            new ol.layer.Tile({
                              source: new ol.source.OSM()
                            })
                          ],
                          view: new ol.View({
                            center: ol.proj.fromLonLat([{{ $apartment->address_lon }}, {{ $apartment->address_lat }}]),
                            zoom: 18
                          })
                        });
                      </script>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xs-12">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <div>
                      <h2>{{ $apartment->price }}€ a pers.</h2>
                    </div>
                    <div class="apartment__main__specific">
                      <h3>Caratteristiche</h3>
                      <ul>
                        <li>Camere: {{ $apartment->rooms_number }}</li>
                        <li>Ospiti: {{ $apartment->guests_number }}</li>
                        <li>Bagni: {{ $apartment->bathrooms }}</li>
                        <li>Dimensioni: {{ $apartment->area_sm }} mq</li>
                      </ul>
                      <h3>Servizi</h3>
                      <ul>
                        @foreach ($apartment->services as $service)
                          <li>{{ $service->name }}</li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 mt-5">
            <div>
              <div class="row">
                <div class="col-12">
                  <h3><b>Scrivi al proprietario</b></h3>
                </div>
              </div>
            </div>
            <div class="">
              <form class="form-group needs-validation" action="{{ route('storeMessage') }}" method="post" novalidate>
                @csrf
                <div class="form-group">
                  <label for="name">Nome</label>
                  <input type="text" name="name" class="form-control" placeholder="Inserisci il nome" required>
                  <div class="valid-feedback">
                      Campo valido
                  </div>
                  <div class="invalid-feedback">
                      Inserisci il tuo nome per esteso
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  @if(isset(Auth::user()->id))
                      <input type="email" name="mail" class="form-control" placeholder="Inserisci la email" value="{{ Auth::user()->email }}" required>
                  @else
                      <input type="email" name="mail" class="form-control" placeholder="Inserisci la email" required>
                  @endif
                  <div class="valid-feedback">
                      Campo valido
                  </div>
                  <div class="invalid-feedback">
                      Inserisci una mail valida
                  </div>
                </div>
                <div class="form-group">
                  <label for="text">Testo</label>
                  <textarea class="form-control" name="content" rows="3" placeholder="Inserisci il testo" required></textarea>
                  <div class="valid-feedback">
                      Campo valido
                  </div>
                  <div class="invalid-feedback">
                      Inserisci un messaggio
                  </div>
                </div>
                <input type="hidden" name="user_id" value="{{ $apartment->user_id }}">
                <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">
                <div class="form-group">
                  <input type="submit" value="Invia" class="form-control">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop
