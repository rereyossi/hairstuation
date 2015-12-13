@extends('template_admin.main')
@section('content')

<form method="POST" action="{{ url('/auth/login') }}">
    {!! csrf_token() !!}

    <div class="form-group">
      <label for="">email</label>
      <input type="text" class="form-control" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
      <label for="">password</label>
      <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
      <label for="">remember me</label>
      <input type="checkbox" class="form-control" name="remember">
    </div>

    <div class="form-group">
      <button type="submit" name="button" class="btn btn-primary">sign in</button>
    </div>

</form>

@stop
