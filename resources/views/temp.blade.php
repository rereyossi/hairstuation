@extends('template_admin.main')
@section('content')
<?php $total = array('null'); ?>
<h2>transaction</h2>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="">
         <th>code</th>
         <th>customer</th>
         <th>email</th>
         <th>date</th>
         <th>subtotal ($)</th>
         <th>shipping ($)</th>
         <th>total ($)</th>
     </tr>
     </thead>
     <tbody>
         <tr>
             <td>{{ $transaction->code }}</td>
             <td>
               {{ $transaction->user->name }}
             </td>
             <td>
               {{ $transaction->user->email }}
             </td>
             <td>
               <?php echo date( 'm-d-20y', strtotime($transaction->date)); ?>
             </td>
             <td>{{ array_sum($total) }}</td>
             <td>{{ $transaction->shipping }}</td>
             <td class="success"><strong>{{ $transaction->total }}</strong></td>
             </td>
         </tr>
     </tbody>

 </table>

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

     <tr>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td></td>
       <td>{{   array_sum($total) }}</td>
     </tr>
     </tbody>

 </table>


@stop
