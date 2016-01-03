@extends('template_admin.main')
@section('content')

{{ $profile->id }}
{{ $profile->address }}
{{ $profile->phone }}

{{ $profile }}
<a href="{{ url('profile/edit') }}" class="btn btn-primary">edit profile</a>
@stop
