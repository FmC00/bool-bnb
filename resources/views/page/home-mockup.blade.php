<!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- CSS: MY CSS -->
     <link rel="stylesheet" href="{{ mix('css/app.css') }}">
     <script src="{{ mix('js/app.js') }}" charset="utf-8"></script>
     <title>BoolBnB</title>
   </head>
   <body>
     <div id="background-top" class="container-fluid vh-100">
       <header class="row position-sticky">
         <div class="col-12 col-md-6 d-flex align-items-center">
           <div id="header-logo" class="h-100 d-flex align-items-center justify-content-end pt-3 pt-md-0">
             <svg viewBox="0 0 1000 1000" role="presentation" aria-hidden="true" focusable="false" style="height:34px; width:34px; fill: white;"><path d="m499.3 736.7c-51-64-81-120.1-91-168.1-10-39-6-70 11-93 18-27 45-40 80-40s62 13 80 40c17 23 21 54 11 93-11 49-41 105-91 168.1zm362.2 43c-7 47-39 86-83 105-85 37-169.1-22-241.1-102 119.1-149.1 141.1-265.1 90-340.2-30-43-73-64-128.1-64-111 0-172.1 94-148.1 203.1 14 59 51 126.1 110 201.1-37 41-72 70-103 88-24 13-47 21-69 23-101 15-180.1-83-144.1-184.1 5-13 15-37 32-74l1-2c55-120.1 122.1-256.1 199.1-407.2l2-5 22-42c17-31 24-45 51-62 13-8 29-12 47-12 36 0 64 21 76 38 6 9 13 21 22 36l21 41 3 6c77 151.1 144.1 287.1 199.1 407.2l1 1 20 46 12 29c9.2 23.1 11.2 46.1 8.2 70.1zm46-90.1c-7-22-19-48-34-79v-1c-71-151.1-137.1-287.1-200.1-409.2l-4-6c-45-92-77-147.1-170.1-147.1-92 0-131.1 64-171.1 147.1l-3 6c-63 122.1-129.1 258.1-200.1 409.2v2l-21 46c-8 19-12 29-13 32-51 140.1 54 263.1 181.1 263.1 1 0 5 0 10-1h14c66-8 134.1-50 203.1-125.1 69 75 137.1 117.1 203.1 125.1h14c5 1 9 1 10 1 127.1.1 232.1-123 181.1-263.1z">
             </path>
             </svg>
           </div>
           <i class="d-inline d-md-none fas fa-angle-down"></i>
         </div>
         {{-- menu da desktop --}}
         <div class="col-md-6 d-none d-md-inline">
           <nav class="w-100 h-100 d-flex align-items-center justify-content-end">
             @if (Route::has('login'))
               @auth
                 <span class="nav-item dropdown">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                         Benvenuto {{ Auth::user()->name }} <span class="caret"></span>
                     </a>

                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                       <a class="dropdown-item" href="{{ route('logout') }}">
                          Dashboard Host
                       </a>
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
                   <a href="{{ route('login') }}">Login</a>
                 </div>
                   @if (Route::has('register'))
                     <div class="h-100 link-container d-flex align-items-center mr-4">
                       <a href="{{ route('register') }}">Registrati</a>
                     </div>
                     <div class="h-100 link-container d-flex align-items-center mr-4">
                       <a href="#">Offri una casa</a>
                     </div>
                     <div class="h-100 link-container d-flex align-items-center mr-4">
                       <a href="#">Offri un'esperienza</a>
                     </div>
                     <div class="h-100 link-container d-flex align-items-center mr-4">
                       <a href="#">Aiuto</a>
                     </div>
                   @endif
               @endauth
             @endif
           </nav>
         </div>
         {{-- fine menu da desktop --}}
         {{-- inizio hamburger menu --}}
         <div id="hamburger-menu-container"class="col-12 vh-100 vw-100 d-inline d-md-none p-0">
           <nav class="w-100 h-100 d-flex flex-column align-items-center justify-content-center">
             <div class="h-100 w-100 link-container d-flex align-items-center justify-content-start p-3">
               <a href="#">Home</a>
             </div>
             <hr class="w-100">
             <div class="h-100 w-100 link-container d-flex flex-column text-left p-3">
               <a href="#">Invita i tuoi amici</a>
               <a href="#">Invita host</a>
               <a href="#">Airbnb for work</a>
             </div>
             <hr class="w-100">
             <div class="h-100 w-100 link-container d-flex flex-column text-left p-3">
               <a href="#">Pubblica il tuo annuncio</a>
               <p>Guadagna fino a 1607€ al mese</p>
               <a href="#">Ulteriori informazioni</a>
               <a href="#">Airbnb for work</a>
             </div>
             <div class="h-100 w-100 link-container d-flex flex-column text-left p-3">
               @if (Route::has('login'))
                 @auth
                   <div class="h-100 w-100 link-container d-flex flex-column p-3">
                     <a href="{{ url('/home') }}">Home</a>
                   </div>
                 @else
                   <div class="h-100 w-100 link-container d-flex flex-column p-3">
                     <a href="{{ route('login') }}">Login</a>
                   </div>
                     @if (Route::has('register'))
                       <div class="h-100 w-100 link-container d-flex flex-column p-3">
                         <a href="{{ route('register') }}">Register</a>
                       </div>
                     @endif
                 @endauth
               @endif

             </div>
           </nav>
         </div>
       </header>
     </div>
     <div class="container-fluid">
       @yield('content')
       <footer class="row">
         <div class="col-12">
       </footer>
     </div>
    </body>
 </html>
