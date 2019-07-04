@extends('layouts.dashboard-layout')
@section('title', 'Messaggi')

@section('content')
  <div class="col-10 offset-1 my-5">
    
    @foreach ($messages as $message)
      <div class="message w-80 p-3 mb-3 border rounded">
        <h4>{{ $message->name }}</h4>
        <h5>{{ $message->mail }}</h5>
        <p>{{ $message->content }}</p>
      </div>
    @endforeach

  </div>
@stop
