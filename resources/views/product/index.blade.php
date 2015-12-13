@extends('template_admin.main')
@section('content')

<div class="row">
  <div class="col-lg-12">

 @foreach ($products as $product)
    <div class="col-sm-6 col-md-4" style="margin-bottom: 20px">
    <div class="thumbnail">
      <img src="..." alt="...">
      <div class="caption">
        <h3>{{ $product->product_name }}</h3>
        <p>{{ $product->desc }}</p>
        <p>{{ $product->price }}</p>
        <p><a href="{{ url('product/detail/'.$product->id ) }}" class="btn btn-primary" role="button">add to cart</a></p>
      </div>
    </div>
  </div>
 @endforeach

  </div>
</div>

@stop
