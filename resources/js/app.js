require('./bootstrap');

window.Vue = require('vue');

function hamburgerMenu(){
  var target = $("#hamburger-logo-header");
  var arrow = $("#hamb-arrow")
  var menu = $("#hamburger-navbar");
  var section = $("#home-section-middle");
  var footer =$('#footer')
  var svg = $("#logo-svg");
  target.click(function(){
    target.toggleClass("bg-white");
    arrow.toggleClass("fa-angle-down");
    arrow.toggleClass("fa-angle-up");
    arrow.toggleClass("grey-arrow");
    menu.fadeToggle();
    section.fadeToggle();
    footer.fadeToggle();
    svg.toggleClass("fill-red");
  });
};

function init(){

  hamburgerMenu();

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
