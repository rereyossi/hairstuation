<nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
          <a class="navbar-brand" href="{{ URL('product/management') }}">admin dashboard</a>
      </div>
      <ul class="nav navbar-nav">
          <li><a href="{{ URL('product/management') }}">product</a></li>
          <li><a href="{{ URL('transaction/management') }}">transaction</a></li>
          <li><a href="{{ URL('comment/management') }}">comment</a></li>
          <li><a href="{{ URL('location/management') }}">shipping</a></li>
          <!-- <li><a href="{{ URL('auth/management') }}">member</a></li> -->
      </ul>
      <ul class="nav navbar-nav pull-right">
        <li><a href="{{ URL('/') }}">home</a></li>
        <li><a href="{{ URL('auth/logout') }}">logout</a></li>
      </ul>
    </div>
</nav>
