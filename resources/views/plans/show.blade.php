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
              <button id="payment-button" type="submit" class="btn btn-bnb d-none">Paga</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop

{{-- @include('components.braintree-script') --}}
@section('scripts')
<script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
<script>
  jQuery.ajax({
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
@endsection
