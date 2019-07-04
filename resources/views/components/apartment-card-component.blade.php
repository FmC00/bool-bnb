<script type="text/x-template" id="apartment-card">
  <div class="apartment-card m-2">
    <div class="apartment-img">
      <img v-bind:src="image" class="w-100">
      </img>
    </div>
    <div class="w-100 mt-3">
      <h4 class="mb-0">@{{ title }}</h4>
    </div>
    <div class="w-100 mt-2">
      <h6 class="mb-0">ospiti: @{{ guests }}</h6>
    </div>
    <div class="w-100 mt-2">
      <h5 class="mb-0">@{{ price }}€</h5>
    </div>
  </div>
</script>
