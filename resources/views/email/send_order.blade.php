@extends('template_email.main')
@section('content')
<h2>tr style="border: 1px solid rgb(225, 225, 225);"ansaction</h2>
<table style="border: 1px solid rgb(225, 225, 225);">
     <thead>
     <tr style="border: 1px solid rgb(225, 225, 225);" class="">
         <th style="border: 1px solid rgb(225, 225, 225);">code</th>
         <th style="border: 1px solid rgb(225, 225, 225);">customer</th>
         <th style="border: 1px solid rgb(225, 225, 225);">email</th>
         <th style="border: 1px solid rgb(225, 225, 225);">date</th>
         <th style="border: 1px solid rgb(225, 225, 225);">subtotal ($)</th>
         <th style="border: 1px solid rgb(225, 225, 225);">shipping ($)</th>
         <th style="border: 1px solid rgb(225, 225, 225);">total ($)</th>
     </tr style="border: 1px solid rgb(225, 225, 225);">
     </thead>
     <tbody>
         <tr style="border: 1px solid rgb(225, 225, 225);" style="border: 1px solid rgb(225, 225, 225);">
             <td style="border: 1px solid rgb(225, 225, 225);" style="border: 1px solid rgb(225, 225, 225);">{{ $tr style="border: 1px solid rgb(225, 225, 225);"ansaction->code }}</td style="border: 1px solid rgb(225, 225, 225);">
             <td style="border: 1px solid rgb(225, 225, 225);" style="border: 1px solid rgb(225, 225, 225);">
               @foreach($tr style="border: 1px solid rgb(225, 225, 225);"ansaction->user as $user)
                  {{ $user->name }}
               @endforeach
             </td style="border: 1px solid rgb(225, 225, 225);">
             <td style="border: 1px solid rgb(225, 225, 225);" style="border: 1px solid rgb(225, 225, 225);" >
               @foreach($tr style="border: 1px solid rgb(225, 225, 225);"ansaction->user as $user)
                  {{ $user->email }}
               @endforeach
             </td style="border: 1px solid rgb(225, 225, 225);">
             <td style="border: 1px solid rgb(225, 225, 225);" style="border: 1px solid rgb(225, 225, 225);" >
               <?php echo date( 'm-d-20y', str style="border: 1px solid rgb(225, 225, 225);"totime($tr style="border: 1px solid rgb(225, 225, 225);"ansaction->date)); ?>
             </td style="border: 1px solid rgb(225, 225, 225);">
             <td style="border: 1px solid rgb(225, 225, 225);" style="border: 1px solid rgb(225, 225, 225);" >{{ $tr style="border: 1px solid rgb(225, 225, 225);"ansaction->subtotal }}</td style="border: 1px solid rgb(225, 225, 225);">
             <td style="border: 1px solid rgb(225, 225, 225);" style="border: 1px solid rgb(225, 225, 225);" >{{ $tr style="border: 1px solid rgb(225, 225, 225);"ansaction->shipping }}</td style="border: 1px solid rgb(225, 225, 225);">
             <td style="border: 1px solid rgb(225, 225, 225);" style="border: 1px solid rgb(225, 225, 225);"  class="success"><str style="border: 1px solid rgb(225, 225, 225);"ong>{{ $tr style="border: 1px solid rgb(225, 225, 225);"ansaction->total }}</str style="border: 1px solid rgb(225, 225, 225);"ong></td style="border: 1px solid rgb(225, 225, 225);">
             </td style="border: 1px solid rgb(225, 225, 225);">
         </tr style="border: 1px solid rgb(225, 225, 225);">
     </tbody>

 </table>

<h2>user detail</h2>
<table style="border: 1px solid rgb(225, 225, 225);" class="table table-str style="border: 1px solid rgb(225, 225, 225);"iped  table-hover">

<tr style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">firstname</td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);"></td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">{{ $profile->firstname }}</td style="border: 1px solid rgb(225, 225, 225);">
</tr style="border: 1px solid rgb(225, 225, 225);">

<tr style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">lastname</td style="border: 1px solid rgb(225, 225, 225);">
<td style="border: 1px solid rgb(225, 225, 225);"></td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">{{ $profile->lastname }}</td style="border: 1px solid rgb(225, 225, 225);">
</tr style="border: 1px solid rgb(225, 225, 225);">


<tr style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">Str style="border: 1px solid rgb(225, 225, 225);"eet Address)</td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);"></td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">{{ $profile->str style="border: 1px solid rgb(225, 225, 225);"eet }}</td style="border: 1px solid rgb(225, 225, 225);">
</tr style="border: 1px solid rgb(225, 225, 225);">

<tr style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">Town / City</td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);"></td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">{{ $profile->city }}</td style="border: 1px solid rgb(225, 225, 225);">
</tr style="border: 1px solid rgb(225, 225, 225);">

<tr style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">Appartement, Office, Etc (Optional)</td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);"></td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">{{ $profile->optionals }}</td style="border: 1px solid rgb(225, 225, 225);">
</tr style="border: 1px solid rgb(225, 225, 225);">

<tr style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">State / Countr style="border: 1px solid rgb(225, 225, 225);"y</td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);"></td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">{{ $profile->state }}</td style="border: 1px solid rgb(225, 225, 225);">
</tr style="border: 1px solid rgb(225, 225, 225);">

<tr style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">Postcode / Zip</td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);"></td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">{{ $profile->postcode }}</td style="border: 1px solid rgb(225, 225, 225);">
</tr style="border: 1px solid rgb(225, 225, 225);">

<tr style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">Email Address</td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);"></td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">{{ $profile->email }}</td style="border: 1px solid rgb(225, 225, 225);">
</tr style="border: 1px solid rgb(225, 225, 225);">

<tr style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">Phone</td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);"></td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">{{ $profile->phone }}</td style="border: 1px solid rgb(225, 225, 225);">
</tr style="border: 1px solid rgb(225, 225, 225);">

<tr style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">Order Notes</td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);"></td style="border: 1px solid rgb(225, 225, 225);">
 <td style="border: 1px solid rgb(225, 225, 225);">{{ $profile->note }}</td style="border: 1px solid rgb(225, 225, 225);">
</tr style="border: 1px solid rgb(225, 225, 225);">

</table>

<h2>product</h2>
<table class="table table-str style="border: 1px solid rgb(225, 225, 225);"iped table-bordered table-hover">
     <thead>
     <tr style="border: 1px solid rgb(225, 225, 225);" class="">
         <th>No</th>
         <th>product name</th>
         <th>description</th>
         <th>price ($)</th>
         <th>discount</th>
         <th>quantity</th>
         <th>subsribe</th>
         <th>subtotal ($)</th>
     </tr style="border: 1px solid rgb(225, 225, 225);">
     </thead>
     <tbody>
        <?php $index = 1; ?>
     @foreach ($products as $product)
         <tr style="border: 1px solid rgb(225, 225, 225);">
             <td style="border: 1px solid rgb(225, 225, 225);">{{ $index }}</td style="border: 1px solid rgb(225, 225, 225);">
             <td style="border: 1px solid rgb(225, 225, 225);"><a href="{{ url('product/detail/'.$product->id) }}">{{ $product->product_name }}</a></td style="border: 1px solid rgb(225, 225, 225);">
             <td style="border: 1px solid rgb(225, 225, 225);">{{ $product->desc }}</td style="border: 1px solid rgb(225, 225, 225);">
             <td style="border: 1px solid rgb(225, 225, 225);">{{ $product->price }}</td style="border: 1px solid rgb(225, 225, 225);">
             <td style="border: 1px solid rgb(225, 225, 225);">
               @if($product->subsribe == 0)
                 {{ '0%' }}
               @else
                 {{ '15%' }}
               @endif
             </td style="border: 1px solid rgb(225, 225, 225);">
             <th>{{ $product->qty }}</th>
             <td style="border: 1px solid rgb(225, 225, 225);">
               @if($product->subsribe == 0)
                  <span class="label label-info">none</span>
               @else
                 {{ $product->subsribe.' mount' }}
               @endif
             </td style="border: 1px solid rgb(225, 225, 225);">
             <th>{{ $product->subtotal }}</th>
         </tr style="border: 1px solid rgb(225, 225, 225);">
           <?php $index++ ?>
     @endforeach


     </tbody>

 </table>


@stop
