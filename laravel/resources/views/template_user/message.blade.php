<div class="container">
  <div class="validation">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  </div>
  <div class="flash">
    @if (Session::has('message'))
        <div class="alert alert-success">
            {!! session('message') !!}
        </div>
     @endif
  </div>
</div>
