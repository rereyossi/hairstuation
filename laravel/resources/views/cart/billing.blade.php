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
@stop
