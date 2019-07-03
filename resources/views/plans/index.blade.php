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
          <div class="card-header">Piani</div>
          <div class="card-body">
            <ul class="list-group">
              @foreach ($plans as $plan)
                <li class="list-group-item clearfix">
                  <div class="pull-left">
                    <h5>{{ $plan->name }}</h5>
                    <h5>{{ number_format($plan->cost, 2)}} €</h5>
                    <h5>{{ $plan->description }}</h5>
                    @if(!$apartment->subscribedToPlan($plan->braintree_plan, 'main'))
                        <a href="{{ route('plans.show', ['slug'=>$plan->slug, 'id'=>$apartment->id]) }}" class="btn btn-bnb pull-right">Scegli</a>
                    @endif
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

@stop
