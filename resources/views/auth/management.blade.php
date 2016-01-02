@extends('template_admin.main')
@section('content')
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
     @foreach ($auths as $auth)
         <tr>
           <td>{{ $index }}</td>
           <td>{{ $auth->name }}</td>
           <td>{{ $auth->email }}</td>
           <td>
             @foreach($auth->group as $group)
               {{ $group->group_name}}
              @endforeach
            </td>
         </tr>
           <?php $index++; ?>
     @endforeach

     </tbody>

 </table>

@stop
