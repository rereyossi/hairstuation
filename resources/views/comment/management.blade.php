@extends('template_admin.main')
@section('content')
<a href="{{ url('comment/create') }}" class="btn btn-primary">add new product</a>
<br><br>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Id</th>
         <th>name</th>
         <th>email</th>
         <th>comment</th>
         <th>create at</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($comments as $comment)
         <tr>
             <td>{{ $comment->id }}</td>
             <td>{{ $comment->name }}</td>
             <td>{{ $comment->email }}</td>
             <td>{{ $comment->comment }}</td>
             <td>{{ $comment->create_at }}</td>
             <td>
               <a href="{{ url('comment/delete/'.$comment->id)  }}">
                 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
               </a>
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>

@stop
