@extends('layouts.app')
@section('head')
  <link href={{ asset("web/css/profile.css")}} rel="stylesheet" type="text/css">
  <script src={{ asset("web/js/profile.js")}}></script>
@endsection

@section('content')

  <section>
    <div class="divi">
    </div>
  </section>

  <!-- Container (About Section) -->
  <section id="me">
      <div class="container" style="margin-top: -10%;">
          <div class="profile-head">
              <div class="col-md- col-sm-4 col-xs-12">
                <img src={{asset("/upload/image/$user->user_photo")}} class="img-responsive" >
                <h6>{{$user->name}}</h6>
              </div><!--col-md-4 col-sm-4 col-xs-12 close-->
              <div class="col-md-5 col-sm-5 col-xs-12">
                  <h5>{{$user->name}}</h5>
                  <p>{{$user->job}} </p>
                  <ul>
                      <li><span class="glyphicon glyphicon-briefcase"></span> {{$user->date_of_birth}}</li>
                      <li><span class="glyphicon glyphicon-map-marker"></span>{{$user->gender}}</li>
                      <li><span class="glyphicon glyphicon-home"></span> {{$user->address}}</li>
                      <li><span class="glyphicon glyphicon-phone"></span> <a href="#" title="call">(+021) 956 789123</a></li>
                      <li><span class="glyphicon glyphicon-envelope"></span><a href="#" title="mail">{{$user->email}} </a>
                        <button type="button" class="btn btn-lg btni" data-toggle="modal" data-target="#editProfile">
                         Edit Profile
                        </button>
                        
                        <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Edit Profile :</h4>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal" role="form" action="{{route('profile.updateprofile')}}"  method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{method_field('PUT')}}
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="control-label">Name</label>

                                        <div class="">
                                            <input id="name" type="text" placeholder="Jone" class="form-control" name="name" value='{{$user->name}}' required autofocus>

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
                                            <input id="email" type="email" placeholder="jone@example.com" class="form-control" name="email" value='{{$user->email}}' required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('user_photo') ? ' has-error' : '' }}">
                                      <label for="user_photo" class="col-md-4 control-label">Photo</label>
                                       <div class="col-md-6">
                                              <input id="user_photo" type="file" class="form-control" name="user_photo" value="{{$user->user_photo}}">

                                              @if ($errors->has('user_photo'))
                                                  <span class="help-block">
                                                      <strong>{{ $errors->first('user_photo') }}</strong>
                                                  </span>
                                              @endif
                                          </div>

                                    <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                                              <label for="date_of_birth" class="col-md-4 control-label">Date of Birth</label>

                                                           <div class="col-md-6">
                                                                  <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{$user->date_of_birth}}" required >

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
                                            <input id="gender" type="text" class="form-control" name="gender" value="{{$user->gender}}" required >


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
                                            <input id="job" type="text" class="form-control" placeholder="student" name="job" value="{{$user->job}}">

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
                                            <input id="mobile" type="tel" placeholder="012-3456-7890" class="form-control" name="mobile" value="{{ old('mobile') }}">

                                            @if ($errors->has('mobile'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('mobile') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div id="googleMap" style="width:100%;height:400px;">
                                    </div>
                                    <input id="lat" name="user_latitude" class="lat" type="hidden" value="@yield('user_latitude')">
                                    <input id="lng" name="user_longitude" class="lon" type="hidden" value="@yield('user_longitude')">
                                    <input id="address" name="user_address" class="adress" type="hidden" value="@yield('user_address')">

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
                  </ul>

              </div><!--col-md-8 col-sm-8 col-xs-12 close-->
          </div><!--profile-head close-->
      </div><!--container close-->
  </section>

  <section id="activity">
      <h1 class="text-center fonti"> Activity </h1>
      <div class="container">
      <div class="row">
        @foreach ($user_attendance as $event)
          <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="well well-sm">
                  <div class="row">
                      <div class="col-sm-6 col-md-4">
                          <img src={{ asset("/upload/image/$event->event_photo") }} alt="" class="img-rounded img-responsive" />
                      </div>
                      <div class="col-sm-6 col-md-8 par">
                        {{$event->event_name}} <br>
                        {{$event->event_description}}

                      </div>
                      <button type="button" class="btn  bton">Delete</button>
                  </div>
              </div>
          </div>
      @endforeach
      </div>
    </div>
  </section>


    <section id="category">
      <div class="container">
          <h1 class="text-center fonti ">Your Category</h1>
          @foreach ($user_subscribtion as $category)
            <div class="col-md-4 text-center ">
              <div class="column">

                <!-- Post-->
                <div class="post-module">
                  <!-- Thumbnail-->
                  <div class="thumbnail">
                    <div class="date"> <a href="#0">
                      <div class="day"><i class="fa fa-times" aria-hidden="true"></i></div>
                      </a> </div>
                    <img src= {{ asset("/upload/image/$category->category_photo") }} class="img-responsive" alt=""> </div>
                  <!-- Post Content-->
                  <div class="post-content">
                    <div class="category"><a href="{{ route('categories.show', $category->id) }}">{{$category->category_name}}</a></div>
                    <h1 class="title">Lorem Ipsum</h1>
                    <h2 class="sub_title">LEAD COORDINATOR</h2>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

          </div>
          <br><br>
    </section>

    <script>
        function myMap() {
            var uluru = {lat: 31.200092, lng: 29.918739};
            var mapProp= {
                center:new google.maps.LatLng(31.200092,29.918739),
                zoom:5,
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
            $('#editProfile').on('shown.bs.modal',function(){
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_0JrPnBAl85q8GhoExBWLry7hat2u8p4&callback=myMap"
            type="text/javascript"></script>

@endsection
