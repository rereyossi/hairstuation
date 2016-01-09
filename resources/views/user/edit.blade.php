@extends('template_admin.main')
@section('content')

<div class="" style="width: 400px; margin: 0 auto;">
  <form  method="POST"  action="{{ url('/user/update') }}">
      {!! csrf_field() !!}

      <div class="form-group">
        <label for="">full name</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
      </div>

      <div class="form-group">
        <label for="">email</label>
        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
      </div>

      <div class="form-group">
        <button type="submit" name="button" class="btn btn-primary">update</button>
      </div>

  </form>
</div>

@stop
