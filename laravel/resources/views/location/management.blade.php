@extends('template_admin.main')
@section('content')

<table id="table_management" class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="">
         <th>no</th>
         <th>country</th>

     </tr>
     </thead>
     <tbody>
         <?php $index = 1; ?>
     @foreach ($locations as $location)
         <tr>
             <td>{{ $index }}</td>
             <td>{{ $location->country }}</td>

         </tr>
          <?php $index++; ?>
     @endforeach

     </tbody>

 </table>

@stop
