@extends('template_admin.main')
@section('content')
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="">
         <th>no</th>
         <th>name</th>
         <th>email</th>
         <th>rating</th>
         <th>comment</th>
         <th>product</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
         <?php $index = 1; ?>
     @foreach ($comments as $comment)
         <tr>
             <td>{{ $index }}</td>
             <td>{{ $comment->name }}</td>
             <td>{{ $comment->email }}</td>
             <td>{{ $comment->rating }}</td>
             <td>{{ $comment->comment }}</td>
             <td>
               <a href="{{ url('product/detail/'.$comment->product->id) }}">
                 {{ $comment->product->product_name }}
               </a>
             </td>
             <td>
               <a href="{{ url('comment/delete/'.$comment->id)  }}" onclick="return confirm('Are you sure want to delete this item')">
                 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
               </a>
             </td>
         </tr>
           <?php $index++; ?>
     @endforeach

     </tbody>

 </table>

@stop
