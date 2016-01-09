@extends('template_user.main')
@section('content')

<div class="" style="width: 400px; margin: 0 auto;">
<form method="POST" action="{{ url('/auth/login') }}">
    {!! csrf_field() !!}
    <div class="form-group">
      <label for="">email</label>
      <input type="text" class="form-control" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
      <label for="">password</label>
      <input type="password" class="form-control" name="password">
    </div>

    <div class="checkbox">
        <label>
          <input name="remember" type="checkbox"> remember me
        </label>
    </div>
    <div class="form-group">
      <a href="{{ url('password/email') }}">forget password</a>
    </div>
    <div class="form-group">
      <button type="submit" name="button" class="btn btn-primary">sign in</button>
    </div>

</form>
</div>

@stop
