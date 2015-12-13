
@extends('template_admin.main')
@section('content')

<form  method="POST" action="{{ url('image/save') }}" enctype="multipart/form-data">
  {!! csrf_field() !!}
<div class="form-group">
  <input type="file" name="file" id="fileToUpload">
</div>

<div class="form-group">
  <label for="">title</label>
  <input type="text" name="title" value="" class="form-control">
</div>

<div class="form-group">
  <label for="">description</label>
  <textarea name="desc" rows="8" cols="40" class="form-control"></textarea>
</div>

<div class="form-group">
    <button type="submit" name="button" class="btn btn-primary">upload</button>
</div>

</form>

@include('image.management')
@stop
