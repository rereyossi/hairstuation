@extends('template_admin.main')
@section('content')

<?php
if (empty($product->id)):
  $product_id= '';
  $product_name = '';
  $desc = '';
  $price = '';
  $category = '';
else:
  $product_id = $product->id;
  $product_name = $product->product_name;
  $desc = $product->desc;
  $price = $product->price;
  $category = $product->status;
endif;
?>
<div class="row">
  <div class="col-lg-12">
      <a href="{{ url('product/management') }}">Back to product management</a>
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
    <h2>Product</h2>
    <hr>
    <form  method="POST" action="{{ url('product/save/'.$product_id) }}">
      {!! csrf_field() !!}
      <input type="hidden" name="product_post" value="product_post">
      <div class="form-group">
        <label>product name </label>
        <input type="text" class="form-control" name="product_name" value="{{ $product_name }}">
      </div>


      <div class="form-group">
        <label>descripsi</label>
        <textarea name="desc" rows="8" cols="40" class="form-control"><?php echo $desc; ?></textarea>
      </div>

      <div class="form-group">
        <label>price</label>
        <input type="number" class="form-control" name="price" value="{{ $price }}">
      </div>

      <div class="form-group">
        <label>category</label>
        <select class="form-control" name="category">
          <?php if($category == 'grooming'): ?>
          <option value="styling">styling</option>
          <option value="grooming" selected>grooming</option>
        <?php else: ?>
          <option value="styling" selected>styling</option>
          <option value="grooming">grooming</option>
        <?php endif; ?>
        </select>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">save</button>
      </div>

    </form>
  </div>
  <div class="col-lg-6">
    <h2>image upload</h2>
    <hr>
    <?php if(!empty($product->id)): ?>
        @include('product.img-upload')
        @include('product.img-list')
    <?php else: ?>
      <div class="alert alert-info" role="alert">save product before uploads images</div>
    <?php endif; ?>
  </div>
</div>


@stop
