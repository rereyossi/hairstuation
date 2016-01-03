@extends('template_admin.main')
@section('content')

<form method="POST" action="{{ url('/auth/register') }}">
    {!! csrf_field() !!}

    <div class="form-group">
      <label for="">phone</label>
      <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
    </div>


    <div class="form-group">
      <button type="submit" name="button" class="btn btn-primary">sign up</button>
    </div>

</form>

@stop
