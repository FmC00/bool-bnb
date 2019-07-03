  <div id="home-section-middle" class="container-fluid">
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
