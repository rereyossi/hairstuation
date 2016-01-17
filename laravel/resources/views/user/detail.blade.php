@extends('template_admin.main')
@section('content')
<a href="{{ url('user/edit') }}" class="btn btn-primary">edit profile</a>
<a href="{{ url('user/password_edit') }}" class="btn btn-primary">change password</a>
<br><br>
<table class="table table-bordered">
  <tr>
    <td>fullname</td>
    <td>:</td>
    <td>{{ $user->name }}</td>
  </tr>
  <tr>
    <td>email</td>
    <td>:</td>
    <td>{{ $user->email }}</td>
  </tr>
</table>
@stop
