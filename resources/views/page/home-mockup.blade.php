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
     <!-- IMG: ICON -->
     <link rel="shortcut icon" href="https://a0.muscache.com/airbnb/static/logotype_favicon-21cc8e6c6a2cca43f061d2dcabdf6e58.ico">
     <title>Case vacanze, alloggi, esperienze e luoghi - Airbnb</title>
   </head>
   <body>
     <div class="container-fluid vh-100 back-top">
       <div class="row position-sticky head-top">
         {{-- div che contiene il logo --}}
         <div class="col-12 col-md-6 d-none d-md-inline">
           <div id="header-logo" class="h-100 d-flex align-items-center justify-content-end pt-3 pr-1 pl-3 pt-3 pt-md-0">
            <a href="{{ route('home') }}">
              <svg viewBox="0 0 1000 1000" role="presentation" aria-hidden="true" focusable="false" style="height:34px; width:34px; fill: white;"><path d="m499.3 736.7c-51-64-81-120.1-91-168.1-10-39-6-70 11-93 18-27 45-40 80-40s62 13 80 40c17 23 21 54 11 93-11 49-41 105-91 168.1zm362.2 43c-7 47-39 86-83 105-85 37-169.1-22-241.1-102 119.1-149.1 141.1-265.1 90-340.2-30-43-73-64-128.1-64-111 0-172.1 94-148.1 203.1 14 59 51 126.1 110 201.1-37 41-72 70-103 88-24 13-47 21-69 23-101 15-180.1-83-144.1-184.1 5-13 15-37 32-74l1-2c55-120.1 122.1-256.1 199.1-407.2l2-5 22-42c17-31 24-45 51-62 13-8 29-12 47-12 36 0 64 21 76 38 6 9 13 21 22 36l21 41 3 6c77 151.1 144.1 287.1 199.1 407.2l1 1 20 46 12 29c9.2 23.1 11.2 46.1 8.2 70.1zm46-90.1c-7-22-19-48-34-79v-1c-71-151.1-137.1-287.1-200.1-409.2l-4-6c-45-92-77-147.1-170.1-147.1-92 0-131.1 64-171.1 147.1l-3 6c-63 122.1-129.1 258.1-200.1 409.2v2l-21 46c-8 19-12 29-13 32-51 140.1 54 263.1 181.1 263.1 1 0 5 0 10-1h14c66-8 134.1-50 203.1-125.1 69 75 137.1 117.1 203.1 125.1h14c5 1 9 1 10 1 127.1.1 232.1-123 181.1-263.1z">
              </path>
              </svg>
            </a>
           </div>
           <i class="d-inline d-md-none fas fa-angle-down"></i>
         </div>
         {{-- fine logo --}}
         {{-- menu da desktop --}}
         <div class="col-md-6 d-none d-md-inline">
           <nav class="w-100 h-100 d-flex align-items-center justify-content-end">
             @if (Route::has('login'))
               @auth
                 <span class="nav-item dropdown">
                     <a class="mr-4" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                         Diventa un host <span class="caret"></span>
                     </a>
                     <div id="LoggedDropdown" class="dropdown-menu dropdown-menu-right" aria-labelledby="BecomeHostDropdown">
                       <a class="dropdown-item" href="{{ route('addApartment') }}">
                          Pubblica il tuo annuncio
                       </a>
                     </div>
                     <a class="mr-4" href="{{ route('messagesApartment') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                         Messaggi <span class="caret"></span>
                     </a>
                     <a class="mr-4" href="{{ route('myDashboard') }}" role="button" aria-haspopup="true" aria-expanded="false" v-pre>
                         Appartamenti <span class="caret"></span>
                     </a>
                 </span>
                 <span class="nav-item dropdown">
                     <a id="UserDropdown" class="mr-4" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                         Benvenuto {{ Auth::user()->name }}<span class="caret"><img src="" alt="" class="user-img"></span>
                     </a>

                     <div id="LoggedDropdown" class="dropdown-menu dropdown-menu-right" aria-labelledby="UserDropdown">
                       {{-- <a class="dropdown-item" href="{{ route('myDashboard') }}">
                          La mia Dashboard
                       </a> --}}
                       <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                       </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                       </form>
                     </div>
                 </span>
               @else
                 <div class="h-100 link-container d-flex align-items-center mr-4">
                   <a href="{{ route('login') }}">Accedi</a>
                 </div>
                   @if (Route::has('register'))
                     <div class="h-100 link-container d-flex align-items-center mr-4">
                       <a href="{{ route('register') }}">Registrati</a>
                     </div>
                   @endif
               @endauth
             @endif
           </nav>
         </div>
         {{-- fine menu da desktop --}}
         {{-- inizio hamburger menu --}}
         <div id="hamburger-menu-container" class="col-12 d-md-none p-0">
           <div id="hamburger-logo-header" class="d-flex align-items-center">
             <div id="logo-hamburger" class="h-100 d-flex align-items-center justify-content-end ml-3 pr-1 pl-3 pt-md-0">
                <svg id="logo-svg"viewBox="0 0 1000 1000" role="presentation" aria-hidden="true" focusable="false" style="height:34px; width:34px; "><path d="m499.3 736.7c-51-64-81-120.1-91-168.1-10-39-6-70 11-93 18-27 45-40 80-40s62 13 80 40c17 23 21 54 11 93-11 49-41 105-91 168.1zm362.2 43c-7 47-39 86-83 105-85 37-169.1-22-241.1-102 119.1-149.1 141.1-265.1 90-340.2-30-43-73-64-128.1-64-111 0-172.1 94-148.1 203.1 14 59 51 126.1 110 201.1-37 41-72 70-103 88-24 13-47 21-69 23-101 15-180.1-83-144.1-184.1 5-13 15-37 32-74l1-2c55-120.1 122.1-256.1 199.1-407.2l2-5 22-42c17-31 24-45 51-62 13-8 29-12 47-12 36 0 64 21 76 38 6 9 13 21 22 36l21 41 3 6c77 151.1 144.1 287.1 199.1 407.2l1 1 20 46 12 29c9.2 23.1 11.2 46.1 8.2 70.1zm46-90.1c-7-22-19-48-34-79v-1c-71-151.1-137.1-287.1-200.1-409.2l-4-6c-45-92-77-147.1-170.1-147.1-92 0-131.1 64-171.1 147.1l-3 6c-63 122.1-129.1 258.1-200.1 409.2v2l-21 46c-8 19-12 29-13 32-51 140.1 54 263.1 181.1 263.1 1 0 5 0 10-1h14c66-8 134.1-50 203.1-125.1 69 75 137.1 117.1 203.1 125.1h14c5 1 9 1 10 1 127.1.1 232.1-123 181.1-263.1z">
                </path>
                </svg>
             </div>
             <i id="hamb-arrow" class="d-inline d-md-none fas fa-angle-down"></i>

           </div>
           {{-- inizio navbar con links dell'hamburger menu --}}
           <div id="hamburger-navbar"  class="vh-100 vw-100">
             <nav class="w-100 h-100 d-flex flex-column align-items-center justify-content-center">
               <div class="w-100 link-container d-flex align-items-center justify-content-start pl-3 pr-3 pb-3 pt-5 mt-3">
                 <a href="#">Home</a>
               </div>
               <hr class="w-100 m-1">
               <div class="h-100 w-100 link-container d-flex flex-column text-left pt-4 pl-3 pr-3 pb-1">
                 <a class="mb-4" href="#">Invita i tuoi amici</a>
                 <a class="mb-4" href="#">Invita host</a>
                 <a href="#">Airbnb for work</a>
               </div>
               <hr class="w-100 m-1">
               <div class="h-100 w-100 link-container d-flex flex-column text-left p-3">
                 <a href="#">Pubblica il tuo annuncio</a>
                 <p class="text-secondary mb-4">Guadagna fino a <b>1607€ al mese</b></p>
                 <a class="mb-4"  href="#">Ulteriori informazioni</a>
                 <a href="#">Offri un'esperienza</a>
                 <p class="text-secondary mb-4">Guadagna facendo ciò che ti piace</p>
               </div>
               <hr class="w-100 m-1">
               <div class="w-100 link-container d-flex flex-column text-left p-3 mb-3">
                 @if (Route::has('login'))
                   @auth
                      <a href="{{ url('/home') }}">Home</a>
                   @else
                       <a href="{{ route('login') }}">Accedi</a>
                       @if (Route::has('register'))
                           <a href="{{ route('register') }}">Registrati</a>
                       @endif
                   @endauth
                 @endif

               </div>
             </nav>
           </div>
         </div>
       </div>
     </div>

     <div id="home-section-middle" class="container-fluid">
       <div class="col-12 mb-5">
         <h1 class="d-flex justify-content-center justify-content-md-start pt-5">Alloggi in tutto il mondo</h1>
       </div>
       <div id="apartments-container" class="col-12 d-flex flex-wrap justify-content-center justify-content-md-start">
         {{-- card appartamento singolo (Vue component)--}}
         @foreach ($apartments as $apartment)
           <apartment-card
           title = {{ $apartment -> name }}
           image = 'https://www.kettler.com/assets/images/AcadiaPoolNEW.jpg'
           location = 'Roma, Italia'>
         </apartment-card>
         @endforeach
         {{-- fine card appartamento singolo --}}
       </div>
       <footer class="row">
         <div class="col-12">
       </footer>
     </div>
     <footer class="row">
      <div id="footer" class="col-12">
        <h1>My Footer</h1>
      </div>
     </footer>
    </body>
 </html>
