@extends('template_admin.main')
@section('content')

<form  method="POST"  action="{{ url('profile/save') }}">
  {!! csrf_field() !!}
  <div class="form-group">
    <label>phone</label>
    <input type="text" class="form-control" name="phone" value="{{ $profile->phone }}">
  </div>

  <div class="form-group">
    <label>address</label>
    <textarea name="address" rows="8" cols="40" class="form-control">{{ $profile->address }}</textarea>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">update</button>
  </div>

</form>

@stop
