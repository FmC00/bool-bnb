<div class="row h-100">
  <div class="col-12 d-flex position-relative">
    <div id="searchbar" class="w-50">
      <form class="d-flex flex-column align-items-center" action="{{route('search')}}" method="get">
        <input class="w-75 text-secondary p-1 pl-4" type="text" name="location" placeholder="Cerca alloggi nella città che preferisci" value="">
        <button class="btn btn-bnb mt-3" type="submit" name="button">Cerca</button>
      </form>
    </div>
  </div>
</div>
