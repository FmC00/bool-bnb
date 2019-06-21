<script type="text/x-template" id="apartment-card">
  <div class="apartment-card m-2">
    <div class="apartment-img">
      <img v-bind:src="image" class="w-100">
      </img>
    </div>
    <div class="w-100">
     <span class="text-secondary">@{{location}}</span>
    </div>
    <div class="w-100">
     <h4 class="mb-0">@{{ title }}</h4>
    </div>
    <div class="w-80 stars">
      <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>(80)
    </div>
  </div>
</script>
