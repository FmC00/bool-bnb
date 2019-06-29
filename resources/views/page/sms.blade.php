{{-- @extends('layouts.dashboard-layout2')
@section('title', 'Messaggi dell\'appartamento:')
@section('right-options')
  <h4>RIGHT</h4>
@stop --}}

@extends('layouts.dashboard-layout')

@section('content')
  <div class="col-10 offset-1 my-5">

    <div class="message w-80 p-3 mb-3 border rounded">
      <h4>Francesco Michele Consoli</h4>
      <h5>email@gmail.com</h5>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="message w-80 p-3 mb-3 border rounded">
      <h4>Francesco Michele Consoli</h4>
      <h5>email@gmail.com</h5>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div class="message w-80 p-3 mb-3 border rounded">
      <h4>Francesco Michele Consoli</h4>
      <h5>email@gmail.com</h5>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>

    @foreach ($messages as $message)
      <div class="message w-80 p-3 mb-3 border rounded">
        <h4>{{ $message->name }}</h4>
        <h5>{{ $message->mail }}</h5>
        <p>{{ $message->content }}</p>
      </div>
    @endforeach


  </div>
@stop
