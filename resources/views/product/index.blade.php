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
             <img src="{{ url('uploads/images/original/'.$img->filename) }}" alt="{{ $img->filename }}" />
           <?php endforeach; ?>
           </div>
     </div>
     <div class="col-md-4" id="kanan">
       <h4 style="color:#F00;">{{ $product->product_name }}</h4>
       {{ $product->desc }}

       <div id="sparator"></div>
       @if($product->category == 'styling')
       <div class="btn-group">
         <a href="{{ url('product/detail/'.$product->id ) }}" class="btn btn-default" type="submit">&nbsp;&nbsp;BUY&nbsp;&nbsp;
         </a>
       </div>
       @endif
     </div>
     <div class="col-md-3"></div>
   </div>

 @endforeach

  </div>
</div>

@stop
