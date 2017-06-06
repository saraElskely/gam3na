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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  {{-- <script src={{ asset("web/js/event.js")}}></script> --}}
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  @yield('head')


  <script>
      window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
      ]) !!};
  </script>

    <style>
    .unread{background-color:red;}
    </style>
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
          @yield('nav_menu')
          @if (Auth::guest())

            <li>
              <button type="button" class="" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">LOG IN</button>

                 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="exampleModalLabel">log in</h4>
                       </div>
                       <div class="modal-body">
                         <form action="login" method="POST">
                           {{ csrf_field() }}
                           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                               <label for="email" class="control-label">E-Mail Address</label>
                               <div class="">
                                   <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                   @if ($errors->has('email'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('email') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                               <label for="password" class="control-label">Password</label>

                               <div class="">
                                   <input id="password" type="password" class="form-control" name="password" required>

                                   @if ($errors->has('password'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('password') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                           <div class="form-group">
                               <div class=" col-md-offset-4">
                                   <div class="checkbox">
                                       <label>
                                           <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                       </label>
                                   </div>
                               </div>
                           </div>
                           <a class="btn btn-link" href="{{ route('password.request') }}">
                               Forgot Your Password?
                           </a>

                           <div class="modal-footer">
                             <div class="form-group">
                                 <div class=" col-md-offset-4">
                                     <a href="{{ url('login/facebook') }}">Login with facebook</a>
                                     <a href="{{ url('login/google') }}">Login with google</a>
                                     <a href="{{ url('login/twitter') }}">Login with twitter</a>
                                 </div>
                             </div>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn ">
                                 Login
                             </button>
                           </div>
                         </form>
                       </div>
                     </div>
                   </div>
                 </div>
            </li>
            <li>
              <button type="button" class="" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo">SIGN UP</button>

                  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="exampleModalLabel">sign Up</h4>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" role="form" method="POST" action="register">
                              {{ csrf_field() }}

                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                  <label for="name" class="control-label">Name</label>

                                  <div class="">
                                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                      @if ($errors->has('name'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('name') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label for="email" class="control-label">E-Mail Address</label>

                                  <div class="">
                                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                      @if ($errors->has('email'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                                  <label for="job" class="control-label">Job</label>

                                  <div class="">
                                      <input id="job" type="text" class="form-control" name="job" value="{{ old('job') }}" required >

                                      @if ($errors->has('job'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('job') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                  <label for="password" class="control-label">Password</label>

                                  <div class="">
                                      <input id="password" type="password" class="form-control" name="password" required>

                                      @if ($errors->has('password'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group">
                                  <label for="password-confirm" class="control-label">Confirm Password</label>

                                  <div class="">
                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                  </div>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn">
                                    Register
                                </button>
                              </div>

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
            </li>

          @else
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    LOGOUT
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
       <p>Copyright 2017 - <a href="mailto:">Gam3na</a></p>
  </div>
  </footer>

    <!-- Scripts -->






    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
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
