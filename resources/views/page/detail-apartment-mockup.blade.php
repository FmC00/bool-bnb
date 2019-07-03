@extends('layouts.dashboard-layout')
@section('title', 'Dettagli dell\'appartamento')
@section('right-options')
  {{-- right-options --}}
@stop
@section('content')

<div class="container-fluid mb-5">
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
                <div class="">
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
    </div>
  </div>
</div>





@stop
