@extends('template_admin.main')
@section('content')

<div class="row">
  <div class="col-lg-12">

 @foreach ($comments as $comment)
    <div class="" style="margin-bottom: 20px">
    <div class="thumbnail">
      <img src="..." alt="...">
      <div class="caption">
        <h3>{{ $comment->name }}</h3>
        <p>{{ $comment->email }}</p>
        <p>{{ $comment->comment }}</p>
      </div>
    </div>
  </div>
 @endforeach

  </div>
</div>

@stop
