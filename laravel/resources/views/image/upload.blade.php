
@extends('template_admin.main')
@section('content')
<?php
  if(!empty($id_product)){
    $id_pro = $id_product;
  }else{
    $id_pro = '';
  }
 ?>
<form  method="POST" action="{{ url('image/save/'.$id_pro) }}" enctype="multipart/form-data">
  {!! csrf_field() !!}
<div class="form-group">
  <input type="file" name="file" id="fileToUpload">
</div>

<div class="form-group">
  <label for="">title</label>
  <input type="text" name="img_title" value="" class="form-control">
</div>

<div class="form-group">
  <label for="">description</label>
  <textarea name="img_desc" rows="8" cols="40" class="form-control"></textarea>
</div>

<div class="form-group">
    <button type="submit" name="button" class="btn btn-primary">upload</button>
</div>

</form>

@include('image.management')
@stop
