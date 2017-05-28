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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .unread{background-color:red;}</style>
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

<<<<<<< HEAD
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

            <li class="dropdown">
               <a href="#" class="dropdown-toggle notification" data-toggle="dropdown" role="button" aria-expanded="false">
                   Notification
                    <span id="count">{{count(auth()->user()->unreadNotifications)}}</span>
                    <span class="caret"></span>
               </a>

               <ul class="dropdown-menu " role="menu" id="shownotification">
               @foreach(auth()->user()->notifications as $note)



                   <li>
                       <a href="" class="{{$note->read_at == null?'unread':''}}">
                       {!! $note->data['data'] !!}

                       </a>
                   </li>
               @endforeach
               </ul>
           </li>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/StreamLab/StreamLab.js"></script>
    <script>
           var message, showdiv=$('#shownotification'),count=$('#count'),c;
           var slh = new StreamLabHtml();
           var sls = new StreamLabSocket({
           appId:'{{config("stream_lab.app_id")}}',
           channelName:"gam3na",
           event:"*"

         });
    var slh = new StreamLabHtml()
    sls.socket.onmessage = function(res){
    slh.setData(res);

    if(slh.getSource()== 'messages'){
        c=parseInt(count.html());
        count.html(c+1);
        message=slh.getMessage();
        showdiv.prepend('<li><a href="" class="unread">'+message+'</a></li>');
    }

   }
    $('.notification').on('click',function(){
        $.get('MarkAllSeen',function(){
            setTimeout(function(){
            count.html(0);
            $('.unread').each(function(){
            $(this).removeClass('unread');
        });
        },3000);
        });

    });
 </script>
</body>
</html>
