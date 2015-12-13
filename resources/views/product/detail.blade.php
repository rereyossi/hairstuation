@extends('template_admin.main')
@section('content')

<div class="row">
  <div class="col-lg-12">


    <div class="col-lg-6">
    <div class="thumbnail">
      <img src="..." alt="...">
      <div class="caption">
        <h3>{{ $product->product_name }}</h3>
        <p>{{ $product->desc }}</p>
        <p>{{ $product->price }}</p>
        <form action="{{ url('cart/create/'.$product->id) }}">
          {!! csrf_field() !!}
          <div class="form-group">
            <input class="form-control" type="number" name="qty" value="1" min="1">
          </div>
          <div class="form-group">
            <select class="form-control" name="subs">
                <option value="1">1 mount</option>
                <option value="2">2 mount</option>
                <option value="3">3 mount</option>
                <option value="4">4 mount</option>
                <option value="5">5 mount</option>
                <option value="6">6 mount</option>
            </select>
          </div>
        <p><button type="submit" class="btn btn-primary">buy</button></p>
        </form>
      </div>
    </div>
  </div>


  </div>
</div>

@stop
