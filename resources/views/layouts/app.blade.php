<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <title>Gma3na @yield('title')</title>
  <link rel="shortcut icon" href= {{ asset("web/images/small_logo.png") }} />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href={{ asset("web/bootstrap-3.3.7-dist/css/bootstrap.min.css") }} >
  <link rel="stylesheet" href={{ asset("web/font-awesome-4.7.0/css/font-awesome.min.css") }} >
     <link href={{ asset("web/css/main.css") }} rel="stylesheet" type="text/css">
  <script src= {{ asset("web/js/jquery-3.1.1.js") }}></script>
  <script src="angular.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>
      window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
      ]) !!};
  </script>

</head>


<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#myPage"><img src= {{ asset("web/images/logo.png") }} class="logo"/></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#about">ABOUT</a></li>
          <li><a href="#category">CATEGORIES</a></li>
          <li><a href="#pricing">OUR TEAM</a></li>
          <li><a href="#contact">CONTACT</a></li>
          @if (Auth::guest())

            <li><a href="login">Login</a></li>
            <li><a href="register">Register</a></li>
          @else
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            <li>
              <a href="#"   role="button" aria-expanded="false">
                  {{ Auth::user()->name }} 
              </a>
            </li>
            {{-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li> --}}
          @endif
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')


  <footer class=" ftr container-fluid text-center ">
  <div class="container">
          <div class="text-center center-block">
              <p class="txt-railway">follow us</p>
              <br />
                  <a href="#"><i class="fa fa-facebook-square fa-3x social"></i></a>
  	            <a href="#"><i class="fa fa-twitter-square fa-3x social"></i></a>
  	            <a href="#"><i class="fa fa-google-plus-square fa-3x social"></i></a>
  	            <a href="#"><i class="fa fa-envelope-square fa-3x social"></i></a>
       </div>
  </div>
  </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
