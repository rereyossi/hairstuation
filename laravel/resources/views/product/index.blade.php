@extends('template_user.main')
@section('content')

<div class="row">
  <div class="col-lg-12">

 @foreach ($products as $product)

 <div class="row" id="wrapper">
     <div class="col-md-3"></div>
     <div class="col-md-2" id="kiri">
         <div class="col-lg-12">
           <?php foreach($product->image as $img): ?>
             <img src="{{ url('uploads/images/medium/'.$img->filename) }}" alt="{{ $img->filename }}" />
           <?php endforeach; ?>
           </div>
     </div>
     <div class="col-md-4" id="kanan">
       <h4 style="color: {{ $product->color }};">{{ $product->product_name }}</h4>
       {{ $product->desc }}

      @if($product->category == 'styling')
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
        @endif

       <div id="sparator"></div>

       <div class="btn-group">
        @if($product->category == 'styling')
         <a href="{{ url('product/detail/'.$product->id ) }}" class="btn btn-default" type="submit">&nbsp;&nbsp;BUY&nbsp;&nbsp;
         </a>
         @else
         <button class="btn btn-default disabled" type="submit">&nbsp;&nbsp;COMING SOON&nbsp;&nbsp;
        </button>
        @endif
       </div>

     </div>
     <div class="col-md-3"></div>
   </div>

 @endforeach

  </div>
</div>

@stop
