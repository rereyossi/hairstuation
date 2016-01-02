


<form  method="POST" action="{{ url('image/save/'.$product_id) }}" enctype="multipart/form-data">
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
    <button type="submit" name="button" class="btn btn-default">upload</button>
</div>

</form>
