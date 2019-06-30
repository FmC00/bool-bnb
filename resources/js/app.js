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

// funzione addInput
function addTitle() {
  $("#input_title").keyup(function() {
    var title = $(this).val();
    $("#title_app").html(title);
    $("#title_app2").html(title);
  });
}

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

function geoSearch() {

  var queue = $('#geoInput').val();

  if(queue.length > 0) {

    $.ajax({
      url: 'https://api.tomtom.com/search/2/geocode/' + queue + '.json',

      method: 'GET',

      data: {
        key: 'OYwFfJFH4jBA3AMNykhlTAixWHywtdIR'
      },

      success: function(inData) {

        $('.suggest-list').empty();

        var results = inData.results;

        for (var i = 0; i < results.length; i++) {

          var result = results[i];
          var address = result['address'];

          var str = "";

          if (address['streetName']) {
            var streetName = address['streetName'];
            str += streetName + ", ";
          }
          if (address['municipality']) {
            var municipality = address['municipality'];
            str += municipality + ", ";
          }
          if (address['countrySubdivision']) {
            var countrySubdivision = address['countrySubdivision'];
            str += countrySubdivision + ", ";
          }
          if (address['country']) {
            var country = address['country'];
            str += country + " ";
          }

          var txt = '<div class="suggest w-100 p-2" data-lon="' + result['position']['lon'] + '" data-lat="' + result['position']['lat'] + '">' + str + '</div>';
          $('.suggest-list').append(txt);
        }
      }
    });
  }
}

function lonlatForm() {

  var me = $(this);
  var lon = me.data('lon');
  var lat = me.data('lat');

  $('#geoInput').val(me.text())
  $('#lon').val(lon);
  $('#lat').val(lat);

  $('.suggest-list').empty();
}

//Braintree Payment
function PaymentBraintree() {

  braintree.setup('sandbox_w32g833s_ksztvby6tg6d78cz', 'dropin', {
    container: 'dropin-container',
    paypal: {
      // singleUse: true,
      // amount: 10.00,
      // currency: 'EUR',
      button: {
        type: 'checkout'
      }
    },
    onPaymentMethodReceived: function (obj) {
      // Do some logic in here.
      // When you're ready to submit the form:
      myForm.submit();
    }
  });
  // Options
  // https://developers.braintreepayments.com/guides/drop-in/setup-and-integration/javascript/v2
  // Guida Laravel Cashier
  // https://appdividend.com/2018/12/04/laravel-cashier-braintree-payment-gateway/
}



function init(){


  hamburgerMenu();

  addTitle();

  $('#geoInput').on('keyup', geoSearch);
  $(document).on('click', '.suggest', lonlatForm)


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

  PaymentBraintree();

  // var input = $("#search_input");
  // input.on('keyup', search);
}

$(document).ready(init);

// 'https://www.kettler.com/assets/images/AcadiaPoolNEW.jpg
