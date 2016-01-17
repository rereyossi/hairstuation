@extends('template_admin.main')
@section('content')



<form class="" action="{{ url('product/update/'.$product->id) }}" method="post">
!! csrf_field() !!}

  <div class="form-group">
    <label for="exampleInputEmail1">product name</label>
    <input type="text" class="form-control" name="product_name">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">description</label>
    <input type="text" class="form-control" name="desc">
  </div>

  <div class="form-group">
    <label>product color </label>
    <input type="text" class="form-control" name="color">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">price</label>
    <input type="number" class="form-control" name="price">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">status</label>
    <input type="text" class="form-control" name="status">
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-default">Submit</button>
  </div>

</form>

@stop
