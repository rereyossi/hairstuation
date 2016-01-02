@extends('template_admin.main')
@section('content')
<form class="" action="{{ url('location/update') }}" method="post">
{!! csrf_field() !!}
<button type="submit" class="btn btn-primary">update</button>
<br><br>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="">
         <th>Id</th>
         <th>country</th>
         <th>price from location 1</th>
         <th>price from location 2</th>
     </tr>
     </thead>
     <tbody>
       <?php $index = 1; ?>
     @foreach ($locations as $location)
         <tr>
             <td><input type="hidden" name="{{ 'id_'.$index }}" value="{{ $location->id }}">{{ $index }}</td>
             <td>{{ $location->country }}</td>
             <td><input type="text" name="{{ 'location1_'.$index }}" value="{{ $location->location1 }}"></td>
             <td><input type="text" name="{{ 'location2_'.$index }}" value="{{ $location->location2 }}"></td>
         </tr>
     <?php $index++; ?>
     @endforeach

     </tbody>

 </table>
</form>
@stop
