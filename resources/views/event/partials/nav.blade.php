<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Gam3na</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/event">Events <span class="sr-only">(current)</span></a></li>
        <li><a href="/event/create" class="glyphicon glyphicon-plus"></a></li>
        @if(Auth::check())
          <li><a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a></li>
        @endif
      </ul>

    </div>
  </div>
</nav>