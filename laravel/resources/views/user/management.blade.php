@extends('template_admin.main')
@section('content')
<a href="{{ url('user/create') }}" class="btn btn-primary">add new admin</a>
<br><br>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="">
       <th>no</th>
       <th>name</th>
       <th>email</th>
       <th>group</th>
     </tr>
     </thead>
     <tbody>
    <?php $index = 1; ?>
     @foreach ($users as $user)
         <tr>
           <td>{{ $index }}</td>
           <td>{{ $user->name }}</td>
           <td>{{ $user->email }}</td>
           <td>
             @foreach($user->group as $group)
              {{ $group->group_name }}
             @endforeach
            </td>
         </tr>
           <?php $index++; ?>
     @endforeach

     </tbody>

 </table>

@stop
