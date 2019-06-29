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
     <title>My Dashboard</title>
   </head>
   <body>
     <div class="container-fluid">
       <div id="row-dashboard" class="row p-5 bg-secondary">
         <div id="dashboard-left" class="vh-100 text-center">

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

           @yield('content')

         </div>

       </div>

     </div>

   </body>
  </html>