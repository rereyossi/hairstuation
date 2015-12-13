@extends('template_admin.main')
@section('content')
<a href="{{ url('product/create') }}" class="btn btn-primary">add new product</a>
<br><br>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Id</th>
         <th>product name</th>
         <th>description</th>
         <th>price</th>
         <th>status</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($products as $product)
         <tr>
             <td>{{ $product->id }}</td>
             <td>{{ $product->product_name }}</td>
             <td>{{ $product->desc }}</td>
             <td>{{ $product->price }}</td>
             <td>{{ $product->status }}</td>
             <td>
               <a href="{{ url('product/delete/'.$product->id)  }}">
                 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
               </a>
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>

@stop
