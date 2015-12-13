@extends('template_admin.main')
@section('content')

<form  method="POST"  action="{{ url('commentar/save') }}">
  {!! csrf_field() !!}
  <input type="hidden" name="id_product" value="2">

  <div class="form-group">
    <label>full name</label>
    <input type="text" class="form-control" name="name">
  </div>


  <div class="form-group">
    <label>email</label>
    <input type="email" class="form-control" name="email">
  </div>


  <div class="form-group">
    <label>comment</label>
    <textarea name="comment" rows="8" cols="40" class="form-control"></textarea>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">sent</button>
  </div>

</form>

@stop
