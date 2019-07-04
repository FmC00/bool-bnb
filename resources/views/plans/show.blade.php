@extends('layouts.dashboard-layout')
@section('title', 'Sponsorizza l\'appartamento:')
@section('right-options')
  {{-- right-options --}}
@stop
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">{{ $plan->name }}</div>
          <div class="card-body">
            <form action="{{ route('subscription.create') }}" method="post">
              @csrf
              <div id="dropin-container"></div>
              <hr>
              <input type="hidden" name="plan" value="{{ $plan->id }}">
              <input type="hidden" name="apartment_id" value="{{ $id }}">

              <input id="payment-button" type="submit" class="btn btn-bnb d-none" value="Paga">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
  <script>
    $.ajax({
        url: "{{ route('token') }}",
    })
    .done(function(res) {
        braintree.setup(res.data.token, 'dropin', {
            container: 'dropin-container',
            onReady: function() {
                $('#payment-button').removeClass('d-none')
            }
        });
    });
  </script>
  {{-- <script type="text/javascript">
  braintree.setup('sandbox_w32g833s_ksztvby6tg6d78cz', 'dropin', {
    container: 'dropin-container',
    paypal: {
      singleUse: true,
      amount: {{ $plan->cost }},
      currency: 'EUR',
      // button: {
      //   type: 'checkout'
      // }
    },
    onPaymentMethodReceived: function (obj) {
      // Do some logic in here.
      // When you're ready to submit the form:
      myForm.submit();
    }
  });
  // Options
  // https://developers.braintreepayments.com/guides/drop-in/setup-and-integration/javascript/v2
  // Guida Laravel Cashier
  // https://appdividend.com/2018/12/04/laravel-cashier-braintree-payment-gateway/
  </script> --}}
@stop

{{-- @include('components.braintree-script') --}}
