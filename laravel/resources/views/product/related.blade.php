@foreach ($relateds as $related)
<div class="col-md-4 product-related">
  <?php foreach($related->image as $img): ?>
  <img class="" src="{{ url('uploads/images/original/'.$img->filename) }}" alt="{{ $img->filename }}" >
  <?php endforeach; ?>
    <span><br><br></span>

    <p>{{ $related->product_name }}</p>
    <?php $rating = $related->rating; ?>
    @for ($i=0; $i < $rating; $i++)
    <span class="glyphicon glyphicon-star"></span>
    @endfor
    @for ($i=0; $i < 5-$rating; $i++)
    <span class="glyphicon glyphicon-star-empty"></span>
    @endfor
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
