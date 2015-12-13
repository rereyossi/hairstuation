@extends('template_admin.main')
@section('content')

<form  method="POST"  action="{{ url('/auth/register') }}">
    {!! csrf_field() !!}

    <div class="form-group">
      <label for="">full name</label>
      <input type="text" class="form-control" name="name" value="{{ old('name') }}">
    </div>

    <div class="form-group">
      <label for="">email</label>
      <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
      <label for="">password</label>
      <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
      <label for="">password confirmation</label>
      <input type="password" class="form-control" name="password_confirmation">
    </div>

    <div class="form-group">
      <button type="submit" name="button" class="btn btn-primary">sign up</button>
    </div>

</form>

@stop
