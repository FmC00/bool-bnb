  <div id="home-section-middle" class="container-fluid">
    <div class="row">
      <div class="col-12 mb-5">
        <h1 class="d-flex justify-content-center justify-content-md-start pt-5">Alloggi in tutto il mondo</h1>
      </div>
      <div id="apartments-container" class="col-12 d-flex flex-wrap justify-content-center justify-content-md-start">
        {{-- card appartamento singolo (Vue component)--}}
        @foreach ($apartments as $apartment)
          <a href="{{ route('detailsApartment', $apartment->id) }}" style="color: black">
            <apartment-card
            title = {{ $apartment -> name }}
            image = 'https://www.kettler.com/assets/images/AcadiaPoolNEW.jpg'
            location = 'Roma, Italia'>
            </apartment-card>
          </a>
        @endforeach
        {{-- fine card appartamento singolo --}}
      </div>

    </div>
  </div>
