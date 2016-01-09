@extends('template_admin.main')
@section('content')

<div class="" style="width: 400px; margin: 0 auto;">
  <form  method="POST"  action="{{ url('/user/password_update') }}">
      {!! csrf_field() !!}

      <div class="form-group">
        <label for="">new password</label>
        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
      </div>

      <div class="form-group">
        <label for="">confirm password</label>
        <input type="password" class="form-control" name="repassword" value="">
      </div>

      <div class="form-group">
        <button type="submit" name="button" class="btn btn-primary">change</button>
      </div>

  </form>
</div>

@stop
