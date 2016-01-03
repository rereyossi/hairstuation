<!DOCTYPE html>
<html lang="en">
    <head>
        <title>hairstuation</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
        <body>

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
