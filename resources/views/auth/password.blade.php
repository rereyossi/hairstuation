@extends('template_admin.main')
@section('content')

<form method="POST" action="{{ url('/password/email') }}">
    {!! csrf_field() !!}

    <div class="form-group">
      <label for="">email</label>
      <input type="text" class="form-control" name="email">
    </div>


    <div class="form-group">
      <button type="submit" name="button" class="btn btn-primary"> Send Password Reset Link</button>
    </div>

</form>

@stop
