<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="author" content="Hair Situation®">
    <meta name="description" content="Hair Situation products are for the man that understands that his grooming and appearance are vital to his professional and personal success.">
    <meta name="keywords" content="hair, situation, hair situation, hair situation products, mens hair products">

    <title>Hair Situation&reg &raquo;
    @if(!empty($header))
      {{ $header}}
    @endif
    </title>

    <link href="{{ url('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ url('css/styles.css') }}" type="text/css" media="all" />
  	<link rel="shortcut icon" href="{{ url('images/HSfavicon.ico') }}">

    <script src="{{ url('js/jquery.min.js') }}"></script>
    <script src="{{ url('bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="row" id="container">
    @include('template_user.menu')
    @include('template_user.share')
    @include('template_user.message')
    <div class="row">
        @yield('content')
    </div>

    <div id="footer"></div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
