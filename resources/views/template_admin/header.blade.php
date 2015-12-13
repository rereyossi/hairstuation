<nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
          <a class="navbar-brand" href="{{ URL('/') }}">admin dashboard</a>
      </div>
      <ul class="nav navbar-nav">
          <li><a href="{{ URL('product/management') }}">product</a></li>
          <li><a href="{{ URL('image/upload') }}">image</a></li>
          <li><a href="{{ URL('comment/management') }}">comment</a></li>
      </ul>
    </div>
</nav>
