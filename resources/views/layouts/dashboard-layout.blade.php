@include('components.apartment-card-component')

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS: MY STYLE -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- JS: MY SCRIPT -->
    <script src="{{ mix('js/app.js') }}" charset="utf-8"></script>
    <script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
    <!-- IMG: ICON -->
    <link rel="shortcut icon" href="https://a0.muscache.com/airbnb/static/logotype_favicon-21cc8e6c6a2cca43f061d2dcabdf6e58.ico">
    <title>My Dashboard</title>
  </head>
  <body>
    <div class="container-fluid">
      <div id="row-dashboard" class="row p-5 bg-secondary">
        <div id="dashboard-left" class="vh-100 text-center">

          {{-- Button dashboard-layout --}}
           <div class="d-flex flex-column p-4 mt-2">
             {{-- <button class="btn btn-option w-50 mx-auto" type="button" name="button"><a href="{{ route('myDashboard') }}"><i class="fas fa-home"></i>HOME</a></button>
             <button class="btn btn-option w-50 mx-auto" type="button" name="button"><a href="{{ route('home') }}"><i class="fas fa-exchange-alt"></i>EXIT</a></button> --}}
             <button class="btn btn-option w-75 mx-auto" type="button" name="button" style="display: none;">
               <i class="fas fa-sign-out-alt"></i><a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('LOGOUT') }}
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
               </form>
             </button>
           </div>
           {{-- <hr class="w-75 mx-auto"> --}}

          <div class="mt-5">
            <a href="{{route('myDashboard')}}">
              <img src="" alt="" class="user-img">
            </a>
            <h4 class="mt-5 text-white mb-5">Benvenuto {{ Auth::user()->name }}</h4>
          </div>
          <hr class="w-75 mx-auto">
          <div class="w-100">
            <button class="btn btn-left w-75 mt-5"><a href="{{ route('addApartment') }}"><i class="fas fa-plus-circle"></i>Aggiungi appartamento</a></button>
            <button class="btn btn-left w-75 mt-5"><a href="{{ route('messagesApartment') }}"><i class="fas fa-envelope"></i>I miei messaggi</a></button>
          </div>
        </div>
        <div id="dashboard-right" class="col-9 bg-light d-flex flex-column justify-content-start vh-100">

          <div class="mr-4 ml-5">
            <div class="d-flex justify-content-between">
              <h4 class="mt-4">
                <span class="h-100 mr-3">
                   <svg viewBox="0 0 1000 1000" role="presentation" aria-hidden="true" focusable="false" style="height:34px; width:34px; fill: #ee555d;"><path d="m499.3 736.7c-51-64-81-120.1-91-168.1-10-39-6-70 11-93 18-27 45-40 80-40s62 13 80 40c17 23 21 54 11 93-11 49-41 105-91 168.1zm362.2 43c-7 47-39 86-83 105-85 37-169.1-22-241.1-102 119.1-149.1 141.1-265.1 90-340.2-30-43-73-64-128.1-64-111 0-172.1 94-148.1 203.1 14 59 51 126.1 110 201.1-37 41-72 70-103 88-24 13-47 21-69 23-101 15-180.1-83-144.1-184.1 5-13 15-37 32-74l1-2c55-120.1 122.1-256.1 199.1-407.2l2-5 22-42c17-31 24-45 51-62 13-8 29-12 47-12 36 0 64 21 76 38 6 9 13 21 22 36l21 41 3 6c77 151.1 144.1 287.1 199.1 407.2l1 1 20 46 12 29c9.2 23.1 11.2 46.1 8.2 70.1zm46-90.1c-7-22-19-48-34-79v-1c-71-151.1-137.1-287.1-200.1-409.2l-4-6c-45-92-77-147.1-170.1-147.1-92 0-131.1 64-171.1 147.1l-3 6c-63 122.1-129.1 258.1-200.1 409.2v2l-21 46c-8 19-12 29-13 32-51 140.1 54 263.1 181.1 263.1 1 0 5 0 10-1h14c66-8 134.1-50 203.1-125.1 69 75 137.1 117.1 203.1 125.1h14c5 1 9 1 10 1 127.1.1 232.1-123 181.1-263.1z">
                   </path>
                   </svg>
                 </span>
                 @yield('title')
                 @yield('title_app')
              </h4>

              <form class="search-form" action="" method="post">
                <div class="search-container mt-4">
                  @yield('right-options')

                  <a id="UserDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="" alt="" class="user-img-dashboard">
                  </a>

                  <div id="LoggedDropdown" class="text-right dropdown-menu dropdown-menu-right" aria-labelledby="UserDropdown">
                    <h5 class="dropdown-item">{{ Auth::user()->name }} {{ Auth::user()->surname }}</h5>
                    <hr class="w-75">
                    <a class="dropdown-item" href="{{ route('addApartment') }}">Aggiungi appartamento</a>
                    <a class="dropdown-item" href="{{ route('messagesApartment') }}">Bacheca messaggi</a>
                    <a class="dropdown-item" href="{{ route('myDashboard') }}">I miei appartamenti</a>
                    <hr class="w-75">
                    <a class="dropdown-item" href="{{ route('home') }}">Ritorna alla Homepage</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       @csrf
                    </form>

                  </div>
                </div>
              </form>
            </div>

            <hr id="hr-all-apartments" class="w-100 ml-0">
          </div>

          @yield('content')

        </div>
      </div>
    </div>
  </body>
 </html>
