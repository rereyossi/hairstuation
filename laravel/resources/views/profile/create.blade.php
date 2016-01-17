@extends('template_admin.main')
@section('content')

<div class="row">
  <div class="col-md-6">
    <h3>Billing details</h3>
    <form  method="POST"  action="{{ url('profile/save') }}">
      {!! csrf_field() !!}
      <div class="form-group">
        <label>first name</label>
        <input type="text" class="form-control" name="firstname">
      </div>

      <div class="form-group">
        <label>last name</label>
        <input type="text" class="form-control" name="lastname">
      </div>
      <div class="form-group">
      <label>country</label>
      <select name="country" class="form-control" placeholder="country" aria-describedby="basic-addon1">
        <option value="1">Country</option>
        <option value="1">United States</option>
        <option value="1">United Kingdom</option>
        <option value="1">Indonesia</option>
        <option value="1">Malaysia</option>
      </select>
    </div>

      <div class="form-group">
        <label>stress/address</label>
        <input type="text" class="form-control" name="street">
      </div>

      <div class="form-group">
        <label>office</label>
        <input name="optionals" type="text" class="form-control" >
      </div>

      <div class="form-group">
        <label>postcode</label>
        <input name="postcode" type="text" class="form-control" >
      </div>

      <div class="form-group">
        <label>email address</label>
        <input name="email" type="email" class="form-control" >
      </div>

      <div class="form-group">
        <label>phone</label>
        <input name="phone" type="text" class="form-control" >
      </div>

      <div class="form-group">
        <label>city</label>
        <input name="city" type="text" class="form-control" >
      </div>

      <div class="form-group">
        <label>state</label>
        <input name="state" type="text" class="form-control" >
      </div>

      <div class="form-group">
        <label>order note</label>
          <textarea name="note" rows="8" cols="40" class="form-control"></textarea>
      </div>




      <div class="form-group">
        <button type="submit" class="btn btn-primary">save</button>
      </div>

    </form>
  </div>
  <div class="col-md-6">
    <h3>Your Order</h3>
      <table class="table">
        <tr>
          <th>product</th>
          <th>total</th>
        </tr>
          @foreach($cart as $row)
              <tr>
                  <td>
                      <p><strong><?php echo $row->name;?></strong></p>
                      <p>
                        <?php
                          if($row->options->has('subs')):
                            echo 'Auto-Replenish: This item will ship now and deliver every '.$row->options->subs.' month(s).';
                          endif;
                        ?>
                      </p>
                  </td>
                  <td>$<?php echo $row->subtotal;?></td>
             </tr>
          @endforeach

          <tr>
              <td>SUBTOTAL</td>
              <td><?php echo '$'.Cart::total(); ?></td>
          </tr>

          <tr>
            <td><strong>TOTAL</strong></td>
            <td style="color:#f7941d;"><strong><?php echo '$'.Cart::total(); ?></strong></td>
          </tr>

      </table>
  </div>
</div>

@stop
