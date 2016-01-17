@foreach ($product->comment as $comment)
<div class="row" style="border-right:#FFFFFF groove thin;">
<div class="col-md-4" id="avatar">
    <img class="img-thumbnail" src="{{ url('img/HSfavicon.png') }}"  alt="Mr Active Styling Glue" height="64" width="64">
  </div>
  <div class="col-md-8">
    <div id="rate">
      <?php $rating = $comment->rating; ?>
      @for ($i=0; $i < $rating; $i++)
      <span class="glyphicon glyphicon-star"></span>
      @endfor
      @for ($i=0; $i < 5-$rating; $i++)
      <span class="glyphicon glyphicon-star-empty"></span>
      @endfor
      </div>

      <div id="komen">
      <h5 style="color:#f7941d;">{{ $comment->name }}</h5>
      <p>{{ $comment->comment }}</p>
    </div>
  </div>
</div>
@endforeach
