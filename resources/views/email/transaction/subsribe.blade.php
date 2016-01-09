@extends('template_email.main')
@section('content')
<h2>code transaction</h2>
<p style="font-size: 24px">
  {{ $transaction->code }}
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
         <th>subsribe</th>
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
               @if($product->subsribe == 0)
                 {{ '0%' }}
               @else
                 {{ '15%' }}
               @endif
             </td>
             <th>{{ $product->qty }}</th>
             <td>
               @if($product->subsribe == 0)
                  <span class="label label-info">none</span>
               @else
                 {{ $product->subsribe.' mount' }}
               @endif
             </td>
             <th>{{ $product->subtotal }}</th>
         </tr>
            <?php $total[] = $product->subtotal;  ?>
           <?php $index++ ?>
     @endforeach
     <!-- subtotal -->
     <tr>
       <td colspan="7"><strong>subtotal</strong></td>
       <td>{{  $subs_subtotal }}</td>
     </tr>
     <!-- shiping -->
     <tr>
       <td colspan="7"><strong>shipping</strong></td>
       <td>{{ $subs_shipping }}</td>
     </tr>

     <tr>
       <td colspan="7"><strong>total</strong></td>
       <td><strong>{{ $subs_total }}</strong></td>
     </tr>
     </tbody>

 </table>


@stop
