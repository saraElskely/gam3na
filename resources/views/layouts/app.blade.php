<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <title>Gam3na @yield('title')</title>
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
    .unread{background-color:#de425f;}
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
        <a class="navbar-brand" href="/home"><img src= {{ asset("web/images/logo.png") }} class="logo"/></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">

          @if (Auth::guest())
            <li><a href="#about">ABOUT</a></li>
            <li><a href="#category">CATEGORIES</a></li>
            <li><a href="#pricing">OUR TEAM</a></li>
            <li><a href="#contact">CONTACT</a></li>
            <li>
              <button type="button" class="lgn" data-toggle="modal" data-target="#login" data-whatever="@mdo">LOG IN</button>
                 <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                   <div class="modal-dialog" role="document">
                     <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="exampleModalLabel">log in</h4>
                       </div>
                       <div class="modal-body">
                         <form action="login" method="POST">
                           {{ csrf_field() }}

                           <input type="hidden" name="form_name" value="login">


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
                                   <input id="password" type="password" class="form-control" name="password" >

                                   @if ($errors->has('password'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('password') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>

                           <div class="modal-footer1">
                                          <div class="checkbox">
                                                  <label>
                                                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                      </label>
                                            </div>
                                            <a class="btn1 btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                            </a>


                             <div class="form-group">
                                     <a href="{{ url('login/facebook') }}" class="btn1"><i class="fa fa-facebook-square fa-3x social " style="color:#1a0dab"></i></a>
                                     <a href="{{ url('login/google') }}" class="btn1"><i class="fa fa-google-plus-square fa-3x social" style="color:#d9534f"></i></a>
                                     <a href="{{ url('login/twitter') }}" class="btn1"><i class="fa fa-twitter-square fa-3x social" style="color:#5bc0de"></i></a>
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

              <button type="button" class="lgn" data-toggle="modal" data-target="#register" data-whatever="@mdo">SIGN UP</button>
                  <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="exampleModalLabel">sign Up</h4>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" role="form" method="POST" action="register" enctype="multipart/form-data">
                           <input type="hidden" name="form_name" value="register">
                              {{ csrf_field() }}
                              {{-- <input type='hidden' name='form_name' value='register'> </input> --}}
                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                  <label for="name" class="control-label">Name<span style="color:red;font-family: monospace;">*</span></label>
                                  <div class="">
                                      <input id="name" type="text" placeholder="Jone" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                      <small  class="form-text text-muted">couldn't start with (numbers,hyphens,_,-,.)</small>

                                      @if ($errors->has('name'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('name') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  <label for="email" class="control-label">E-Mail Address<span style="color:red;font-family: monospace;">*</span></label>
                                  <div class="">
                                      <input id="email" type="email" placeholder="jone@example.com" class="form-control" name="email" value="{{ old('email') }}" required>
                                      @if ($errors->has('email'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('email') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>

                              <div class="form-group{{ $errors->has('user_photo') ? ' has-error' : '' }}">
                                        <label for="user_photo" class="control-label">Photo</label><br>
                                          <div class="">
                                              <input id="user_photo" type="file" class="form-control" name="user_photo" value="{{ old('user_photo') }}">
                                                    @if ($errors->has('user_photo'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('user_photo') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                              </div>
                              <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                          <label for="date_of_birth" class="control-label">Date of Birth<span style="color:red;font-family: monospace;">*</span></label>

                                                     <div class="">
                                                            <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" required >

                                                            @if ($errors->has('date_of_birth'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                  </div>

                                       <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                              <label for="gender" class="control-label">Gender</label>

                                    <div class="">
                                      <select name="gender">
                                        <option value="female">female</option>
                                        <option value="male">male</option>
                                      </select>

                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                              <div class="form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                                  <label for="job" class="control-label">Job</label>
                                  <div class="">
                                      <input id="job" type="text" class="form-control" placeholder="student" name="job" value="{{ old('job') }}">

                                      @if ($errors->has('job'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('job') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                              <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                  <label for="mobile" class="control-label">Mobile</label>

                                  <div class="">
                                      <input id="mobile" type="tel" placeholder="201234567890" class="form-control" name="mobile" value="{{ old('mobile') }}">
                                      <small  class="form-text text-muted">should start with 2</small>

                                      @if ($errors->has('mobile'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('mobile') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                  <label for="password" class="control-label">Password<span style="color:red;font-family: monospace;">*</span></label>
                                  <div class="">
                                      <input id="password" type="password" class="form-control" name="password" required>
                                      <small class="form-text text-muted">at least 6 characters-one upper/lower case/one number  </small>

                                      @if ($errors->has('password'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('password') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="password-confirm" class="control-label">Confirm Password<span style="color:red;font-family: monospace;">*</span></label>
                                  <div class="">
                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                  </div>
                              </div>
                             <label for="user_address" class="control-label">Address</label>

                              <div id="googleMap" style="width:100%;height:400px;">
                              </div>
                              <input id="lat" name="user_latitude" class="lat" type="hidden" value="@yield('user_latitude')">
                              <input id="lng" name="user_longitude" class="lon" type="hidden" value="@yield('user_longitude')">
                              <input id="address" name="user_address" class="adress" type="hidden" value="@yield('user_address')">

                               <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_0JrPnBAl85q8GhoExBWLry7hat2u8p4&callback=myMap"
                                      type="text/javascript"></script>
                                 <script>

                                  function myMap() {
                                      var uluru = {lat: 31.200092, lng: 29.918739};
                                      var mapProp= {
                                          center:new google.maps.LatLng(31.200092,29.918739),
                                          zoom:8,
                                      };
                                      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
                                      var geocoder = new google.maps.Geocoder;
                                      var address = document.getElementById('address').value;
                                      var longt = document.getElementById('lng').value;
                                      var latt = document.getElementById('lat').value;
                                      latt=parseFloat(latt);
                                      longt=parseFloat(longt);
                                      if(latt && longt){
                                          console.log(latt, longt);
                                          var u = {lat: parseFloat(latt), lng: parseFloat(longt)};
                                          var marker = new google.maps.Marker({
                                              position: u,
                                              map: map,

                                          });
                                      }else{
                                          var marker = new google.maps.Marker({
                                              position: uluru,
                                              map: map,

                                          });
                                      }
                                      google.maps.event.addListener(map, 'click', function(event) {
                                          // alert(event.latLng);
                                          placeMarker(map, event.latLng ,marker,geocoder);
                                      });
                                      $('#register').on('shown.bs.modal',function(){
                                        google.maps.event.trigger(map,'resize');
                                      });
                                  }
                                  function placeMarker(map, location ,marker,geocoder) {
                                      marker = marker.setPosition(location);
                                      map.panTo(location);
                                      $('.lat').val(location.lat());
                                      $('.lon').val(location.lng());
                                      geocoder.geocode({'location': location}, function(results, status) {
                                          if (status === 'OK') {
                                              if (results[1]) {
                                                  map.setZoom(11);
                                                  $('.adress').val(results[1].formatted_address);
                                              } else {
                                                  window.alert('No results found');
                                              }
                                          } else {
                                              window.alert('Geocoder failed due to: ' + status);
                                          }
                                      });
                                  }
                              </script>

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
            <li class="createAct"> <a href="{{url('/event/create')}}">CREATE ACTIVITY</a></li>
            <li role="presentation"><a href="{{url('/categories')}}">CATEGORIES</a></li>
            <li role="presentation"><a href="{{route('user.calendar')}}"> CALENDER </a></li>
            <li class="dropdown">
               <a href="#" class="dropdown-toggle notification" data-toggle="dropdown" role="button" aria-expanded="false">
                   NOTIFICATION
                   @php
                     $count = count(auth()->user()->unreadNotifications);
                   @endphp
                   @if ($count != 0)
                     <span id="count" class="badge">{{$count}}</span>
                     <span class="caret"></span>
                   @else
                     <span class="caret"></span>
                   @endif

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
           @php
             $photo = Auth::user()->user_photo;
           @endphp
           <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                 <img src={{ asset("/upload/image/$photo") }} class="pp"/ >

             </a>
             <ul class="dropdown-menu">
               <li>
                 <a href="/profile" >
                     {{ Auth::user()->name }}
                 </a>
               </li>
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
                  <a href="https://www.facebook.com/%D8%B4%D8%AE%D8%A7%D8%A8%D9%8A%D8%B7-%EA%95%A5-1417133151901989/"><i class="fa fa-facebook-square fa-3x social"></i></a>
  	            <a href="https://twitter.com/Gam3naNetwork"><i class="fa fa-twitter-square fa-3x social"></i></a>
  	            <a href="https://www.instagram.com/?hl=en"><i class="fa fa-instagram fa-3x social"></i></a>
       </div>
       <p>Copyright 2017 &copy; <a href="mailto:" class="hyperln">Gam3na</a></p>
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
jQuery.noConflict();
    @if (count($errors) > 0 and  old('form_name') === 'register')
    // alert('regester');
        $('#register').modal('show');
    @elseif (count($errors) > 0 and  ! old('form_name') )
    // alert('login');
      $('#login').modal('show');
    @endif

 </script>


</body>
</html>
