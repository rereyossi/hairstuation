@extends('template_admin.main')
@section('content')
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr>
         <th>no</th>
         <th>customer</th>
         <th>email</th>
         <th>date</th>
         <th>subtotal ($)</th>
         <th>shipping ($)</th>
         <th>total ($)</th>
     </tr>
     </thead>
     <tbody>
    <?php $index = 1; ?>
     @foreach ($transactions as $transaction)
         <tr>
             <td>{{ $index }}</td>
             <td>
               <a href="{{ url('transaction/detail/'.$transaction->id) }}">
                 @foreach($transaction->user as $user)
                    {{ $user->name }}
                 @endforeach
               </a>
             </td>
             <td>
               @foreach($transaction->user as $user)
                  {{ $user->email }}
               @endforeach
             </td>
             <td>{{ date( 'm-d-20y', strtotime($transaction->date)) }}</td>
             <td>{{ $transaction->subtotal }}</td>
              <td>{{ $transaction->shipping }}</td>
               <td><strong>{{ $transaction->total }}</strong></td>
         </tr>
           <?php $index++; ?>
     @endforeach

     </tbody>

 </table>

@stop
