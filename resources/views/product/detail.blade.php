@extends('template_user.main')
@section('content')


<div class="row" id="wrapper">
      <div class="col-md-3"></div>
      <div class="col-md-2" id="kiri">
      	<div class="row">
        	<div class="col-lg-12">
              <?php foreach($product->image as $img): ?>
            	<img id="image1" src="{{ url('uploads/images/original/'.$img->filename) }}" alt="{{ $img->filename }}">
              <?php endforeach; ?>
            </div>
        </div>
      </div>
      <div class="col-md-4" id="kanan">
      	<h4 style="color:#F00;">{{ $product->product_name }}</h4>
        <p>
          {{ $product->desc }}
        </p>

        <div class="rating">
          <?php $rating = $product->rating; ?>
          @for ($i=0; $i < $rating; $i++)
          <span class="glyphicon glyphicon-star"></span>
          @endfor
          @for ($i=0; $i < 5-$rating; $i++)
          <span class="glyphicon glyphicon-star-empty"></span>
          @endfor
        </div>
        <h3>{{ '$'.$product->price }}</h3>


        <div id="sparator"></div>
        <div class="row">
          <form action="{{ url('cart/create/'.$product->id) }}">
            {!! csrf_field() !!}
            <?php foreach($product->image as $img): ?>
            <input type="hidden" name="img" value="{{  $img->filename  }}">
            <?php endforeach; ?>
        	<div class="col-md-3 btn-group">
                	<button class="btn btn-default" type="submit">add to cart
                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                    </button>
            </div>
            <div class="col-md-3 form-group">
                <select name="qty" id="quantity" class="form-control" placeholder="Quantity" aria-describedby="basic-addon1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
            </div>
            <div class="col-md-6 form-group">
                <select  name="subs" id="month" class="form-control" placeholder="Country" aria-describedby="basic-addon1">
                    <option value="0">DELIVERED TO ME EVERY:</option>
                    <option value="1">1 MONTH</option>
                    <option value="2">2 MONTH</option>
                    <option value="3">3 MONTH</option>
                    <option value="4">4 MONTH</option>
                    <option value="5">5 MONTH</option>
                    <option value="6">6 MONTH</option>
                </select>
            </div>

            </form>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
<!-- comment sistem -->
<div class="row" id="reviews">
      <div class="col-md-3"></div>
      <div class="col-md-3">
      	<h3 style="color:#f7941d;">Product Reviews</h3>
         @include('comment.index')
      </div>


      <div class="col-md-3">
         @include('comment.create')
      </div>
      <div class="col-md-3"></div>
    </div>

<!-- end comment sistem -->

<div class="row" id="related">
    	<div class="col-md-3"></div>
    	<div class="col-md-6">
        	<h3 style="color:#f7941d;">Related Products</h3>
            <div class="row">
            	 @include('product.related')
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>



@stop
