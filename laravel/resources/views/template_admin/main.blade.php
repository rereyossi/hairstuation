<!DOCTYPE html>
<html lang="en">
    <head>
        <title>admin dashboard</title>
        <script src="{{ url('assets/js/jquery.min.js') }}"></script>
        <script src="{{ url('assets/js/angular.min.js') }}"></script>
        <link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}" media="screen" title="no title" charset="utf-8">
    </head>
        <body>

            @include('template_admin.header')
            <!-- /.navbar-collapse -->
            <!-- Page Heading -->

            <!-- /.row -->
            <div class="container wrapper-box">
                @if(!empty($header))
                <header>
                  <h1 class="text-header">
                    {{ $header }}
                  </h1>
                </header>
                @endif
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
<style media="screen">
  body{
    background: #EFEFEF none repeat scroll 0% 0%;
  }
  .navbar.navbar-inverse{
    box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.16), 0px 2px 10px 0px rgba(0, 0, 0, 0.12);
    border-radius: 0px !important;
    background-color: #3D4051;
    position: fixed;
    top: 0px;
    right: 0px;
    left: 0px;
    z-index: 1030;
    text-transform: uppercase;
  }
  .navbar-nav li:hover{
    background-color: #009688;
    color: #fff;
  }
  /*button*/
  .btn-primary{
    text-transform: capitalize;
  }
  /*header*/
  .text-header{
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid rgb(0, 150, 136);
    text-transform: uppercase;
    font-size: 21px;
  }
  h2{
    text-transform: capitalize;
    font-size: 20px;
  }
  .wrapper-box{
      padding-top: 40px;
    background-color: #FFF;
    padding-bottom: 40px;
    box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.1);
    margin-top: 100px;
    margin-bottom: 100px;
  }
  label{
    text-transform: capitalize;
  }
  /*table*/
  .table th{
    text-transform: capitalize;
  }
</style>
