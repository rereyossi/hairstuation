@extends('template_user.main')
@section('content')
<form action="{{ url('cart/update') }}" method="POST">
{!! csrf_field() !!}

<div class="row" id="cartlist">
      <div class="col-md-2"></div>
      <div class="col-md-5">
      	<h3 style="color:#f7941d;"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp; Cart</h3>
        <div class="table-responsive">
        <table class="table table-condensed" id="cartable">
        	<thead>
                <tr>
                    <th colspan="3">Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
              <?php $index = 1;?>
              @foreach($cart as $row)


            	<tr>
                	<td id="cartdelete">
                      <a href="{{ url('cart/delete/'.$row->rowid) }}"><span class="glyphicon glyphicon-remove"></span></a>
                  </td>
                    <td id="cartimage">
                      <?php
                      $filename =  $row->options->img;
                       ?>
                        <?php if($row->options->has('img')): ?>
                          <img src="{{ url('uploads/images/small/'.$filename) }}" alt="{{ $filename}}" />
                        <?php endif; ?>
                    </td>
                	<td><strong><?php echo $row->name;?></strong></td>
                    <td>
                      {{ '$'.$row->options->old_price }}
                      @if($row->options->subs > 0)
                      <br>
                      <span style="color: #F7941D;">15%</span>
                      @endif

                    </td>
                    <td class="count-parent">
                    	<span data-multi="-1" class="counting count_nav glyphicon glyphicon-minus"></span>
                      <span class="qty count_value">{{ $row->qty }}</span>
                      <span data-multi="1" class="counting count_nav glyphicon glyphicon-plus"></span>
                      <input class="count_new" type="hidden" name="{{ 'qty_'.$index }}" value="<?php echo $row->qty?>">
                    </td>
                    <td>$<?php echo $row->subtotal;?></td>
                </tr>
                <?php if($row->options->subs > 0): ?>
                <tr id="sublist">
                	<td colspan="4" class="count-parent">
                    	<h6>Auto-Replenish: This item will ship now and deliver every
                        <span data-multi="-1" class="counting count_subs glyphicon glyphicon-minus"></span>
                        <span class ="subs" style="color:#f7941d;">
                          <span class="count_value">{{ $row->options->subs }}</span> month(s).
                        </span>
                        <span data-multi="1" class="counting count_subs glyphicon glyphicon-plus"></span>
                        <input class="count_new" type="hidden" name="{{ 'subs_'.$index }}" value="{{ $row->options->subs  }}">
                      </h6>
                    </td>
                    <!-- <td><a><h5>Modify</h5></a></td>
                    <td><a><h5>Remove</h5></a></td> -->
                </tr>
              <?php endif; ?>

              <?php $index++?>
              @endforeach

            </tbody>
        </table>
        </div>
      </div>

      <div class="col-md-3" style="margin-top:50px;">
      	<ul class="list-group" id="cartlistnav">
        	<li class="list-group-item active">
              CART TOTALS
            </li>
            <li class="list-group-item">
              Subtotal
              <span class="badge"><?php echo "$ ".Cart::total(); ?></span>
            </li>
            <li class="list-group-item">
              Shippping
              <span class="badge"><em>
                <!-- shipping count start -->
                  {{ '$'.$cost }}
                <!-- shipping count end -->
              </em></span>
            </li>

        	   <li class="list-group-item">
              <strong>TOTAL</strong>
            </li>
            <li class="list-group-item" style="color:#f7941d; text-align:right">
              <h4><strong><?php echo "$".$cost+Cart::total(); ?></strong></h4>
            </li>
        </ul>
        <div class="list-group" id="cartlistnav">
        	<button type="submit" class="list-group-item" style="text-align: left;">Update Cart</button>
          <a  href="{{ url('cart/billing') }}" type="button" class="list-group-item">Proceed To Checkout</a>
        </div>


      </div>
      <div class="col-md-2"></div>
    </div>
  </form>
  <style media="screen">
    .counting{
      cursor: pointer;
    }
  </style>
  <script>
    $(document).ready(function() {
      $(".count_nav").on("click", function () {
        var button = $(this);
        var input = button.closest('.count-parent').find(".count_value");
        var input_new = button.closest('.count-parent').find(".count_new");


        input.html(function(i, value) {
            if (value == 1) {
              return 2;
            }else{
              return +value + (1 * +button.data('multi'));
            }




        });

        input_new.val(function(i, value) {
          if (value == 1) {
            return 2;
          }else{
            return +value + (1 * +button.data('multi'));
          }
        });
    });


    $(".count_subs").on("click", function () {
      var button = $(this);
      var input = button.closest('.count-parent').find(".count_value");
      var input_new = button.closest('.count-parent').find(".count_new");


      input.html(function(i, value) {
          if (value == 1) {
            return 2;
          }else if(value >= 6){
            return 1;
          }
          else{
            return +value + (1 * +button.data('multi'));
          }




      });

      input_new.val(function(i, value) {
        if (value == 1) {
          return 2;
        }else if(value >= 6){
          return 1;
        }
        else{
          return +value + (1 * +button.data('multi'));
        }
      });


  });
    });
  </script>
@stop
