@extends('template_admin.main')
@section('content')
<a href="{{ url('location/edit') }}" class="btn btn-primary">edit</a>
<br><br>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="">
         <th>no</th>
         <th>country</th>
         <th>price from location 1</th>
         <th>price from location 2</th>
     </tr>
     </thead>
     <tbody>
         <?php $index = 1; ?>
     @foreach ($locations as $location)
         <tr>
             <td>{{ $index }}</td>
             <td>{{ $location->country }}</td>
             <td>{{ $location->location1 }}</td>
             <td>{{ $location->location2 }}</td>
         </tr>
          <?php $index++; ?>
     @endforeach

     </tbody>

 </table>

@stop
