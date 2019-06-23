require('./bootstrap');

window.Vue = require('vue');

function init(){

  Vue.component('apartment-card',{
    template:'#apartment-card',
    props:{
      title: String,
      image: String,
      location: String
    }

  });
  new Vue({
    el:"#apartments-container"
  });
}

$(document).ready(init);

// 'https://www.kettler.com/assets/images/AcadiaPoolNEW.jpg
