@extends('template_admin.main')
@section('content')
<a href="{{ url('profile/create') }}" class="btn btn-primary">add new product</a>
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
     @foreach ($profiles as $profile)
         <tr>
             <td>{{ $profile->id }}</td>
             <td>{{ $profile->phone }}</td>
             <td>{{ $profile->address }}</td>
             <td>{{ $profile->created_at }}</td>
             <td>
               <a href="{{ url('profile/delete/'.$profile->id)  }}">
                 <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
               </a>
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>

@stop
