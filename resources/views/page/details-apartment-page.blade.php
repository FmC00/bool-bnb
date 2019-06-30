@extends('layouts.home-layout')
@section('content')

    {{-- <form id="apartmentVisitCount" action="{{ route('updateApartment', $apartment->id) }}" method="post">
      @csrf
      <input type="text" name="visitCount" value="{{ $apartment->visit_count }}">
    </form>

    <script type="text/javascript">

      setTimeout(function() {

        let visitCount = document.getElementById('apartmentVisitCount').value;
        let visitCountPlusOne = parseInt(visitCount) + 1;

        document.getElementById('apartmentVisitCount').value = visitCountPlusOne;

        let $formVar = $('form');

        $.ajax({
          url: $formVar.prop('{{ route('updateApartment', $apartment->id) }}'),
          method: 'PUT',
          data: $formVar.serialize()
        });
      }, 1000);
    </script> --}}



    <div class="container-fluid">

      <div class="container p-3 d-flex justify-content-between">

        <img class="rounded" src="https://www.kettler.com/assets/images/AcadiaPoolNEW.jpg" style="height: 300px;">

        <div class="container d-flex align-items-center justify-content-end">
          <h1 class="">{ $apartment->title }</h1>
        </div>

      </div>

      <div class="">
        <div class="container">

            <div class="row">
              <div class="col-12">
                <div class="alert-danger p-3 text-center rounded">
                  {{-- solo se l'utente è proprietario --}}
                  <a href="{ route('appartamento.modifica', $apartment->id) }" class="btn btn-bnb">Modifica</a>
                  <a href="{{ route('plans.index') }}" class="btn btn-bnb">Sponsorizza</a>
                  {{-- anche se l'utente non è proprietario --}}
                  <a href="{ route('apaprtamento.statistiche', $apartment->id) }" class="btn btn-bnb">Visualizza statistiche</a>
                  <a href="{ route }" class="btn btn-bnb">Contatta il proprietario</a>
                </div>
              </div>
            </div>


          <div class="row mt-5">


            <div class="col-lg-8 col-xs-12">
              <div class="container">
                <div class="row">

                  <div class="col-12">
                    <div class="">
                      <h3>Descrizione</h3>
                      <p>{ $apartment->description }</p>
                    </div>
                    <div class="">
                    </div>
                    <h3>Indirizzo</h3>
                    <p>{ $apartment->street } { $apartment->house_number }, { $apartment->locality }, { $apartment->postal_code }, { $apartment->state }</p>
                  </div>


                  <div class="col-12">
                    <div class="">
                      <h3>Mappa</h3>
                        <img src="https://www.luigisabbetti.it/wp-content/uploads/2018/12/xgoogle-maps-a-pagamento-1.jpg.pagespeed.ic.bAPaYTl23Y.jpg" alt="" style="height: 300px;">
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-lg-4 col-xs-12">
              <div class="container">
                <div class="row">

                  <div class="col-12">

                      <div class="">
                        <h2>{ $apartment->price }€ a pers.</h2>
                      </div>

                      <div class="apartment__main__specific">
                        <h3>Caratteristiche</h3>
                        <ul>
                          <li>Camere: { $apartment->rooms }</li>
                          <li>Letti: { $apartment->beds }</li>
                          <li>Bagni: { $apartment->bathrooms }</li>
                          <li>Dimensioni: { $apartment->square_meters } mq</li>
                        </ul>
                        <h3>Servizi</h3>
                        <li>Servizi: { $apartment->services }</li>
                      </div>

                  </div>

                </div>
              </div>
            </div>


          </div>



          <div class="col-12 mt-5">
            <div class="">
                <div class="row">
                    <div class="col-12">
                        <h3><b>Scrivi al proprietario</b></h3>
                    </div>
                </div>
            </div>
            <div class="">
                <form class="form-group needs-validation" action="{ route('apartment.message.store') }" method="post" novalidate>
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
                            <input type="email" name="email" class="form-control" placeholder="Inserisci la email" value="{ Auth::user()->email }" required>
                        @else
                            <input type="email" name="email" class="form-control" placeholder="Inserisci la email" required>
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
                        <textarea class="form-control" name="text" rows="3" placeholder="Inserisci il testo" required></textarea>
                        <div class="valid-feedback">
                            Campo valido
                        </div>
                        <div class="invalid-feedback">
                            Inserisci un messaggio
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{ $apartment->user_id }">
                    <input type="hidden" name="apartment_id" value="{ $apartment->id }">
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
