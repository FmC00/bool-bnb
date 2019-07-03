<div class="container">
  <div class="row">
    <div id="searchbar" class="w-md-50 w-75">
      <form class="w-100 d-flex flex-column align-items-center justify-content-center" action="{{route('search')}}" method="get" style="height:300px;">
        <input id="geoInput" class="custom w-100 text-secondary p-1 pl-4" type="text" name="location" placeholder="Cerca alloggi nella città che preferisci" value="">
        <div id="suggest-box" class="w-100">
          <div class="suggest-list d-flex flex-column align-items-center w-100 text-secondary bg-white mx-auto">
          </div>
        </div>
        <input id="lat" type="hidden" name="lat" value="">
        <input id="lon" type="hidden" name="lon" value="">
        <button class="btn btn-bnb mt-4" type="submit" name="button" style="font-size:16px;border-radius:10px;">Cerca</button>
      </form>
    </div>
  </div>
</div>
