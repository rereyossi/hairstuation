@extends('template_admin.main')
@section('content')

<div class="" style="width: 400px; margin: 0 auto;">
  <form  method="POST"  action="{{ url('/user/save') }}">
      {!! csrf_field() !!}

      <div class="form-group">
        <label for="">firstname</label>
        <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">
      </div>

      <div class="form-group">
        <label for="">lastname</label>
        <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">
      </div>

      <div class="form-group">
        <label for="">email</label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
      </div>

      <div class="form-group">
        <label for="">password</label>
        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
      </div>

      <div class="form-group">
        <label for="">password confirmation</label>
        <input type="password" class="form-control" name="repassword">
      </div>

      <div class="form-group">
        <button type="submit" name="button" class="btn btn-primary">sign up</button>
      </div>

  </form>
</div>

@stop
