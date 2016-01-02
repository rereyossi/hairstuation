
  <h3 style="color:#f7941d;">Billing details</h3>
  <form  method="POST"  action="{{ url('cart/save') }}">
    {!! csrf_field() !!}

  <div class="row">
    <div class="col-md-6">
        <input name="firstname" class="form-control" placeholder="First Name" aria-describedby="basic-addon1" type="text">
      </div>
      <div class="col-md-6">
        <input name="lastname" class="form-control" placeholder="Last Name" aria-describedby="basic-addon1" type="text">
      </div>
  </div>
  <span>&nbsp;</span>
  <div class="form-group">
    <select id="location" name="country" class="form-control" placeholder="Send product from" aria-describedby="basic-addon1">
      <option class="location1" value="location1" selected="selected" >location 1</option>
      <option class="location2" value="location2" >location 2</option>
    </select>
  </div>
  <select id="country" name="country" class="form-control" placeholder="Send product to country" aria-describedby="basic-addon1">

    @foreach($locations as $location)
      <option value="{{ $location->country }}">{{ $location->country }}</option>
    @endforeach

  </select>
  <span>&nbsp;</span>
  <div class="row">
    <div class="col-md-6">
        <input name="street" class="form-control" placeholder="Street Address" aria-describedby="basic-addon1" type="text">
      </div>
      <div class="col-md-6">
        <input name="city" class="form-control" placeholder="Town / City" aria-describedby="basic-addon1" type="text">
      </div>
  </div>
  <div class="row">
    <div class="col-md-6">
        <input name="optionals" class="form-control" placeholder="Appartement, Office, Etc (Optional)" aria-describedby="basic-addon1" type="text">
      </div>
      <div class="col-md-6">
        <input name="state" class="form-control" placeholder="State / Country" aria-describedby="basic-addon1" type="text">
      </div>
  </div>
  <div class="row">
    <div class="col-md-6">
        <input name="postcode" class="form-control" placeholder="Postcode / Zip" aria-describedby="basic-addon1" type="text">
      </div>
  </div>
  <span>&nbsp;</span>
  <div class="row">
    <div class="col-md-6">
        <input name="email" class="form-control" placeholder="Email Address" aria-describedby="basic-addon1" type="text">
      </div>
      <div class="col-md-6">
        <input name="phone" class="form-control" placeholder="Phone" aria-describedby="basic-addon1" type="text">
      </div>
  </div>
  <span>&nbsp;</span>
  <div class="input-group">
    <label for="comment">Order Notes:</label>
  <textarea class="form-control" rows="5" cols="70" id="comment"></textarea>
  </div>

  <input type="hidden" class="shipping" name="shipping" value="">
  <div class="form-grup" style="margin-top: 20px;">
      <button type="submit" name="save" class="btn btn-default">save</button>
  </div>


</form>
