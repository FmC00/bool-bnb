<script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>
<script>
  jQuery.ajax({
      url: "{{ route('token') }}",
  })
  .done(function(res) {
      braintree.setup(res.data.token, 'dropin', {
          container: 'dropin-container',
          onReady: function() {
              $('#payment-button').removeClass('d-none')
          }
      });
  });
</script>
