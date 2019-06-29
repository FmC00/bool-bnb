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
       @include('sections.header-homepage')
       @include('sections.searchbar-homepage')
     </div>
     @include('sections.content-homepage')
     <div class="container-fluid">
       <footer class="row">
        <div id="footer" class="col-12">
          <h1>My Footer</h1>
        </div>
       </footer>
     </div>
    </body>
 </html>
