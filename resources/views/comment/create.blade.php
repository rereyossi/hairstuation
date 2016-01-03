
<script src="{{ url('bootstrap-rating-master/bootstrap-rating.min.js') }}"></script>
<form  method="POST"  action="{{ url('comment/save/'.$product->id) }}">
  {!! csrf_field() !!}

<span><br><br><br><br><br><br></span>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user">
    </span></span>
<input name="name" class="form-control" placeholder="Your Name" aria-describedby="basic-addon1" type="text">
</div>
<span>&nbsp;</span>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope">
    </span></span>
<input name="email" class="form-control" placeholder="Your Email" aria-describedby="basic-addon1" type="email">
</div>
<span>&nbsp;</span>
<div id="rate" style="cursor: pointer;">
    <input type="hidden" class="rating"/>
</div>
<input id="rating" type="hidden" name="rating" value="1">
<div class="input-group">
  <label for="comment">Comment:</label>
<textarea name="comment" class="form-control" rows="5" cols="30" id="comment"></textarea>
</div>
<span>&nbsp;</span>
<div class="input-group">
  <button class="btn btn-default" type="submit">
  Submit </button>
</div>

</div>

</form>
<script>
  jQuery(document).ready(function($) {
    $('.rating').on('change', function () {
      var nilai = $(this).val();
      $('#rating').val(nilai);
    });
  });
</script>
