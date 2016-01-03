@extends('template_admin.main')
@section('content')

<form  method="POST"  action="{{ url('profile/update') }}">
  {!! csrf_field() !!}
  <div class="form-group">
    <label>first name</label>
    <input type="text" class="form-control" name="firstname" value="{{ $profile->firstname }}">
  </div>

  <div class="form-group">
    <label>last name</label>
    <input type="text" class="form-control" name="lastname" value="{{ $profile->firstname }}">
  </div>

  <select name="country" class="form-control" placeholder="country" aria-describedby="basic-addon1">
    <option value="1">Country</option>
    <option value="1">United States</option>
    <option value="1">United Kingdom</option>
    <option value="1">Indonesia</option>
    <option value="1">Malaysia</option>
  </select>

  <div class="form-group">
    <label>stress/address</label>
    <input type="text" class="form-control" name="street"value="{{ $profile->street }}">
  </div>

  <div class="form-group">
    <label>office</label>
    <input name="optionals" type="text" class="form-control" value="{{ $profile->optionals }}">
  </div>

  <div class="form-group">
    <label>postcode</label>
    <input name="postcode" type="text" class="form-control" value="{{ $profile->postcode }}">
  </div>

  <div class="form-group">
    <label>email address</label>
    <input name="email" type="email" class="form-control" value="{{ $profile->email }}">
  </div>

  <div class="form-group">
    <label>phone</label>
    <input name="phone" type="text" class="form-control" value="{{ $profile->phone }}">
  </div>

  <div class="form-group">
    <label>city</label>
    <input name="city" type="text" class="form-control" value="{{ $profile->city }}">
  </div>

  <div class="form-group">
    <label>country</label>
    <input name="state" type="text" class="form-control" value="{{ $profile->state }}">
  </div>

  <div class="form-group">
    <label>order note</label>
    <textarea name="note" rows="8" cols="40" class="form-control">{{ $profile->note }}</textarea>
  </div>


  <div class="form-group">
    <button type="submit" class="btn btn-primary">update</button>
  </div>

</form>


@stop
