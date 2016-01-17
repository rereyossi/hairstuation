@extends('template_admin.main')
@section('content')
<strong>Code Transaction : {{ $transaction->code }}</strong><br>
@if($transaction->subsribe > 0)
<strong>Subribe : {{ $transaction->subsribe.' Mount' }}</strong>
@endif
<p>
  <strong>Date Order :</strong>
  <?php echo date( 'm-d-20y', strtotime($transaction->date)); ?>
</p>
<h2>user detail</h2>
<table class="table table-striped  table-hover">

<tr>
 <td>firstname</td>
 <td></td>
 <td>{{ $profile->firstname }}</td>
</tr>

<tr>
 <td>lastname</td>
<td></td>
 <td>{{ $profile->lastname }}</td>
</tr>


<tr>
 <td>Street Address)</td>
 <td></td>
 <td>{{ $profile->street }}</td>
</tr>

<tr>
 <td>Town / City</td>
 <td></td>
 <td>{{ $profile->city }}</td>
</tr>

<tr>
 <td>Appartement, Office, Etc (Optional)</td>
 <td></td>
 <td>{{ $profile->optionals }}</td>
</tr>

<tr>
 <td>State / Country</td>
 <td></td>
 <td>{{ $profile->state }}</td>
</tr>

<tr>
 <td>Postcode / Zip</td>
 <td></td>
 <td>{{ $profile->postcode }}</td>
</tr>

<tr>
 <td>Email Address</td>
 <td></td>
 <td>{{ $profile->email }}</td>
</tr>

<tr>
 <td>Phone</td>
 <td></td>
 <td>{{ $profile->phone }}</td>
</tr>

<tr>
 <td>Order Notes</td>
 <td></td>
 <td>{{ $profile->note }}</td>
</tr>

</table>

<h2>product</h2>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="">
         <th>No</th>
         <th>product name</th>
         <th>description</th>
         <th>price ($)</th>
         <th>discount</th>
         <th>quantity</th>
         <th>subtotal ($)</th>
     </tr>
     </thead>
     <tbody>
        <?php $index = 1; ?>
     @foreach ($products as $product)
         <tr>
             <td>{{ $index }}</td>
             <td><a href="{{ url('product/detail/'.$product->id) }}">{{ $product->product_name }}</a></td>
             <td>{{ $product->desc }}</td>
             <td>{{ $product->price }}</td>
             <td>
               @if($transaction->subsribe > 0)
                 {{ '15%' }}
                @else
                  {{ '0%' }}
                @endif
             </td>
             <th>{{ $product->qty }}</th>
             <th>{{ $product->subtotal }}</th>
         </tr>
           <?php $index++ ?>
     @endforeach
     <tr>
       <td colspan="6"><p><strong>Sub Total</strong></p></td>
       <td><p>$ {{  $transaction->subtotal  }}</p></td>
     </tr>
     <tr>
       <td colspan="6"><p><strong>Shipping</strong></p></td>
       <td><p>$ {{ $transaction->shipping }}</p></td>
     </tr>
     <tr bgcolor="#F7941D">
       <td colspan="6"><p><strong>Total</strong></p></td>
       <td><p>$ {{ $transaction->total }}</p></td>
     </tr>
     </tbody>

 </table>


@stop
