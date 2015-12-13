<!DOCTYPE html>
<html lang="en">
    <head>
        <title>admin dashboard</title>
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    </head>
        <body>

            @include('template_admin.header')
            <!-- /.navbar-collapse -->
            <!-- Page Heading -->

            <!-- /.row -->
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
                @yield('content')
            </div>

        </body>
</html>
