@extends('template_admin.main')
@section('content')

<a href="{{ url('cart/update') }}" class="btn btn-primary">update</a>
<a href="{{ url('cart/checkout') }}" class="btn btn-info">Checkout</a>
<br><br>
<div class="cartlist">
  <table class="table table-striped table-bordered table-hover">
      <thead>
          <tr>
              <th>Product</th>
              <th>Subcribe</th>
              <th>Qty</th>
              <th>Item Price</th>
              <th>Subtotal</th>
              <th colspan="3">Actions</th>
          </tr>
      </thead>

      <tbody>

      @foreach($cart as $row)
      <form action="{{ url('cart/edit/'.$row->rowid) }}">

          <tr>
              <td>
                  <p><strong><?php echo $row->name;?></strong></p>
              </td>
              <td>
              <?php
                if($row->options->has('subs')):
                  echo $row->options->subs;
                endif;
              ?>
              </td>
              <td>
                  <input type="text" value="{{ $row->qty }}">
              </td>
              <td>$<?php echo $row->price;?></td>
              <td>$<?php echo $row->subtotal;?></td>
              <td>
                <a href="{{ url('cart/delete/'.$row->rowid) }}">
                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                </a>
              </td>
         </tr>

      @endforeach
    </form>

      </tbody>
  </table>
</div>

@stop
