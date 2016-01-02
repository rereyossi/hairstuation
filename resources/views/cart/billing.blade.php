@extends('template_user.main')
@section('content')
<div class="row" id="checkout">
      <div class="col-md-2"></div>
      <div class="col-md-5">
          @include('cart.profile')
      </div>

      <div class="col-md-3">
          @include('cart.order-check')
      </div>
      <div class="col-md-2"></div>
  </div>
  <script>
  $( document ).ready(function() {
    $('#location').on('change', function(){
      get_price();
    });

    $('#country').on('change', function(){
        get_price();
    });

    function get_price(){
      var locations = $('#location').val();
      var countrys = $('#country').val();
      var token = $('input[name="_token"]').val();
      var url = "{{ url('location/get_price') }}";
      $.ajax({
          url: url,
          type: 'POST',
          data: {
            '_token': token,
            'location': locations,
            'country': countrys,
          },
          dataType: 'JSON',
          success: function (data) {
            $('.shipping').val(parseInt(data));
            $('#order-shipping').empty().html(data);
            $('#order-total').empty();

            var subtotal = parseInt($('#order-subtotal').html());
            var shipping = parseInt(data);
            var new_total = subtotal+shipping;
            $('#order-total').html(new_total);
          }
      });

    }

  });
  </script>
@stop
