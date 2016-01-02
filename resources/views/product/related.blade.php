@foreach ($relateds as $related)
<div class="col-md-4 product-related">
  <?php foreach($related->image as $img): ?>
  <img class="" src="{{ url('uploads/images/original/'.$img->filename) }}" alt="{{ $img->filename }}" >
  <?php endforeach; ?>
    <span><br><br></span>

    <p>{{ $related->product_name }}</p>
    <span class="glyphicon glyphicon-star"></span>
    <span class="glyphicon glyphicon-star"></span>
    <span class="glyphicon glyphicon-star"></span>
    <span class="glyphicon glyphicon-star"></span>
    <span class="glyphicon glyphicon-star-empty"></span>
    <h4>$ {{ $related->price }}</h4>
    <a href="{{ url('product/detail/'.$related->id ) }}" class="btn btn-default">&nbsp;&nbsp;BUY&nbsp;&nbsp;</a>
</div>
@endforeach
<style media="screen">
  .product-related{
    padding: 50px;
  }
  .product-related img{
    width: 100%;
  }
</style>
