@extends('template_email.main')
@section('content')

<table width="100%" cellpadding="0" cellspacing="0" bgcolor="e4e4e4"><tr><td>


  <table id="top-message" cellpadding="20" cellspacing="0" width="600" align="center">
  		<tr>
  			<td align="center">
  				<p>Trouble viewing this email? <a href="{{ url('transaction/detail_user/'.$transaction->id) }}">View in Browser</a></p>
  			</td>
  		</tr>
  </table>


  <table id="main" width="600" align="center" cellpadding="0" cellspacing="15" bgcolor="ffffff">
    <tr><!-- header -->
      <td>
        <table id="header" cellpadding="10" cellspacing="0" align="center" bgcolor="8fb3e9">
          <tr>
            <td width="570" bgcolor="#000" colspan="3"><img src="http://hairsituation.com/images/logo.gif" width="170" /></td>
          </tr>
          <tr>
            <td width="570" bgcolor="#F7941D" colspan="3"><h2 style="color:#ffffff!important">Thank You For Your Order</h2></td>
          </tr>
          <tr>
            <td width="570" align="left" bgcolor="#ffffff"><p>Invoice ID: {{ $transaction->code }}</p></td>
            <td width="570" align="center" bgcolor="#ffffff"><p>Invoice Date: <?php echo date( 'm-d-20y', strtotime($transaction->date)); ?></p></td>
            <td width="570" align="right" bgcolor="#ffffff"><p>Due Date: 12 January 2016</p></td>
          </tr>
        </table>
      </td>
    </tr><!-- header -->

    <tr><!-- content-1 -->
      <td>
        <table id="content-1" cellpadding="0" cellspacing="0" align="center">
          <tr>
            <td width="570"><h6>Hallo,  {{ $transaction->user->name }}</h6></td>
          </tr>
          <tr>
            <td width="570"><p>Your order has been received and now being processed. Your order details are shown below for your reference.</p></td>
          </tr>
        </table>
      </td>
    </tr><!-- content-1 -->

    <tr><!-- sparator -->
		<td height="30"><img src="http://dummyimage.com/570x30/fff/fff.png" /></td>
	</tr><!-- sparator -->

    <tr><!-- content-2 -->
			<td>
				<table id="content-2" cellpadding="0" cellspacing="0" align="center">
          <tr><td colspan="3"><h5>Order Summary</h5></td></tr>
					<tr>
						<td width="180" valign="top">
              <h6>Customer Details</h6>
							<p> {{ $transaction->user->name }}</p>
              <p>{{ $profile->street }}</p>
              <p>{{ $profile->city }}, {{ $profile->state }} {{ $profile->postcode }}</p>
              <a href="#">{{ $profile->email }}</a>
              <p>+P: {{ $profile->phone }}</p>
						</td>
						<td width="15"></td>
						<td width="180" valign="top">
              <h6>Shipping Details</h6>
              <p> {{ $transaction->user->name }}</p>
              <p>{{ $profile->street }}</p>
              <p>{{ $profile->city }}, {{ $profile->state }} {{ $profile->postcode }}</p>
              <a href="#">{{ $profile->email }}</a>
              <p>+P: {{ $profile->phone }}</p>
						</td>
						<td width="15"></td>
						<td width="180" valign="top" align="left" style="border: 1px solid #cfcece; padding:10px;">
              <h6 style="border-bottom: 1px solid #cfcece;">How To Pay</h6>
              <p>Bank Account</p>
              <p>2121333244</p>
              <a href="#">PayPal Acccount</a>
              <a href="mailto:info@hairsituation.com">info@hairsituation.com</a>
              <p>+P: 123-000-1234</p>
						</td>
					</tr>
				</table>
			</td>
		</tr><!-- content-2 -->

    <tr><!-- content-3 -->
      <td>
        <table id="content-3" cellpadding="0" cellspacing="0" align="center">
          <tr bgcolor="#F7941D" align="center">
            <td width="150" valign="top">
              <p><strong>Product</strong></p>
            </td>
            <td width="150" valign="top">
              <p><strong>Subsribe</strong></p>
            </td>
            <td width="150" valign="top">
              <p><strong>Price</strong></p>
            </td>
            <td width="150" valign="top">
              <p><strong>Subsribe</strong></p>
            </td>
            <td width="150" valign="top">
              <p><strong>Discount</strong></p>
            </td>
            <td width="150" valign="top">
              <p><strong>Quantity</strong></p>
            </td>
            <td width="150" valign="top">
              <p><strong>Sub Total</strong></p>
            </td>
          </tr>
 @foreach ($products as $product)
          <tr align="center">
            <td width="150" valign="top"><p><a href="{{ url('product/detail/'.$product->id) }}">{{ $product->product_name }}</a></p></td>
            <td width="150" valign="top"><p>$ {{ $product->price }}</p></td>
              <td width="150" valign="top"><p>
                @if($transaction->subsribe == 0)
                   <span class="label label-info">none</span>
                @else
                  {{ $transaction->subsribe.' mount' }}
                @endif
              </p></td>
                <td width="150" valign="top"><p>
                  @if($transaction->subsribe == 0)
                    {{ '0%' }}
                  @else
                    {{ '15%' }}
                  @endif
                </p></td>

              <td width="150" valign="top"><p>{{ $product->qty }}</p></td>
            <td width="150" valign="top"><p>$ {{ $product->subtotal }}</p></td>
          </tr>

    @endforeach
          <tr align="center"><td colspan="4">&nbsp;</td></tr>
          <tr align="center">
            <td colspan="2"></td>
            <td><p><strong>Sub Total</strong></p></td>
            <td><p>$ {{  $transaction->subtotal  }}</p></td>
          </tr>
          <tr align="center">
            <td colspan="2"></td>
            <td><p><strong>Shipping</strong></p></td>
            <td><p>$ {{ $transaction->shipping }}</p></td>
          </tr>
          <tr align="center" bgcolor="#F7941D">
            <td colspan="2"></td>
            <td><p><strong>Total</strong></p></td>
            <td><p>$ {{ $transaction->total }}</p></td>
          </tr>
        </table>
      </td>
    </tr><!-- content-3 -->

    <tr><!-- sparator -->
		<td height="30"><img src="http://dummyimage.com/570x30/fff/fff.png" /></td>
	</tr><!-- sparator -->

  </table><!-- main -->

	<table id="bottom-message" cellpadding="20" cellspacing="0" width="600" align="center"><!-- bottom message -->
		<tr>
			<td align="center">
				<p>As always, customer service is our number one priority. Please let us know if we can be of assistance. If you have any questions or comments, please contact us directly at </p><a href="mailto:info@hairsituation.com">info@hairsituation.com</a>
			</td>
		</tr>
	</table><!-- bottom message -->
</td></tr></table><!-- wrapper -->




@stop
