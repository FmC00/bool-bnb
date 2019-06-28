require('./bootstrap');

window.Vue = require('vue');

// Hamburger menu
function hamburgerMenu(){
  var target = $("#hamburger-logo-header");
  var arrow = $("#hamb-arrow")
  var menu = $("#hamburger-navbar");
  var section = $("#home-section-middle");
  var searchPage = $("#search-page-container");
  var footer =$('#footer')
  var svg = $("#logo-svg");
  target.click(function(){
    target.toggleClass("bg-white");
    arrow.toggleClass("fa-angle-down");
    arrow.toggleClass("fa-angle-up");
    arrow.toggleClass("grey-arrow");
    // questi fade fanno sparire gli elementi della pagina al clic(sia home-mockup che search-page)
    menu.fadeToggle();
    section.fadeToggle();
    searchPage.fadeToggle();
    footer.fadeToggle();
    // riempimento dell'svg del logo con il colore
    svg.toggleClass("fill-red");
  });
};

// funzione di ricerca degli appartamenti
function search() {
  console.log("Hello World");

  var me = $("#search_input");
  var content = me.val().toLowerCase();

  var list = $("#apartments-container");

  list.removeClass("d-none");

  for (var i = 0; i < list.length; i++) {

    var apartment = list.eq(i);
    console.log(apartment);
    var name = apartment.find("h4");
    var listContent = name.text().toLowerCase();

    if (!listContent.includes(content)) {

      apartment.addClass("d-none");
    }
  }
}

// funzione addInput
function addTitle() {
  $("#input_title").keyup(function() {
    var title = $(this).val();
    $("#title_app").html(title);
    $("#title_app2").html(title);
  });
}

// function addPrice() {
//
//   var price = $("#input_price").val();
//   console.log(price);
//   if (price === 0 || null) {
//
//     console.log("uguale a zero o null");
//
//     $("#price_app").html("");
//   } else {
//
//     console.log("diverso da zero");
//
//     $("#input_price").keyup(function() {
//       price = $(this).val();
//       $("#price_app").html("€." + ' ' + price);
//     });
//   };
// }


function init() {

  hamburgerMenu();

  addTitle();
  // addPrice();

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

  // var input = $("#search_input");
  // input.keyup(search);
}

$(document).ready(init);

// 'https://www.kettler.com/assets/images/AcadiaPoolNEW.jpg
