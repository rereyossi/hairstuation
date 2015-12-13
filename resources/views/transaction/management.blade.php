@extends('template_admin.main')
@section('content')
<a href="{{ url('product/create') }}" class="btn btn-primary">add new transaction</a>
<br><br>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Id</th>
         <th>code</th>
         <th>date</th>
         <th>total price</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($transactions as $transaction)
         <tr>
             <td>{{ $transaction->id }}</td>
             <td>{{ $transaction->code }}</td>
             <td>{{ $transaction->date }}</td>
             <td>{{ $transaction->total }}</td>
             <td>
               <a href="{{ url('transaction/delete/'.$transaction->id)  }}">
                 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
               </a>
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>

@stop
