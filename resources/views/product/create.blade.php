@extends('template_admin.main')
@section('content')

<form  method="POST" action="{{ url('product/save') }}">
  {!! csrf_field() !!}
  <div class="form-group">
    <label>product name</label>
    <input type="text" class="form-control" name="product_name">
  </div>


  <div class="form-group">
    <label>descripsi</label>
    <textarea name="desc" rows="8" cols="40" class="form-control"></textarea>
  </div>

  <div class="form-group">
    <label>price</label>
    <input type="number" class="form-control" name="price">
  </div>

  <div class="form-group">
    <label>status</label>
    <input type="text" class="form-control" name="status">
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-default">save</button>
  </div>

</form>

@stop
