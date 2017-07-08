@extends('layouts.app')
@section('head')
  <link href={{ asset("web/css/profile.css")}} rel="stylesheet" type="text/css">
  <script src={{ asset("web/js/profile.js")}}></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

              </div><!--col-md-4 col-sm-4 col-xs-12 close-->
              <div class="col-md-5 col-sm-5 col-xs-12">
                  <h5>{{$user->name}}</h5>
                  <ul>
                    <li><i class="fa fa-building-o" aria-hidden="true"></i>{{$user->job}} </li>
                    <li><i class="fa fa-calendar" aria-hidden="true"></i> {{$user->date_of_birth}}</li>
                    <li><span class="fa fa-venus-mars"></span>{{$user->gender}}</li>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{$user->address}}</li>
                    <li><i class="fa fa-mobile" aria-hidden="true"></i>{{$user->mobile}}</a></li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="{{$user->email}}" title="mail">{{$user->email}} </a>
                    </li>
                  </ul>

              </div><!--col-md-8 col-sm-8 col-xs-12 close-->
          </div><!--profile-head close-->
      </div><!--container close-->
  </section>

  @if(!empty($user->events))
    <section id="activity">
        <h1 class="text-center fonti"> Your Activity </h1>
        <div class="container">
        <div class="row">
          @foreach ($user->events as $event)
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <img src={{ asset("/upload/image/$event->event_photo") }} alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-6 col-md-8 par">
                          <h2><a href="/event/{{$event->id}}/checkevent">{{$event->event_name}}</a> </h2>
                          <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{$event->event_address}}</p>
                          <p><i class="fa fa-calendar" aria-hidden="true"></i>{{date('d-M-Y',strtotime($event->event_date))}}
                             <i class="fa fa-clock-o" aria-hidden="true"></i>{{date('H:i',strtotime($event->event_date))}}</p>

                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        </div>
      </div>
    </section>
  @endif




  <section id="activity">
      <h1 class="text-center fonti"> Joined Activities </h1>
      <div class="container">
      <div class="row">
        @foreach ($user_attendance as $event)
          <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="well well-sm1">
                  <div class="row">
                      <div class="col-sm-6 col-md-4">
                          <img src={{ asset("/upload/image/$event->event_photo") }} alt="" class="img-rounded img-responsive" />
                      </div>
                      <div class="col-sm-6 col-md-8 par">
                        <h2><a href="/event/{{$event->id}}/checkevent">{{$event->event_name}}</a> </h2>
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i>{{$event->event_address}}</p>
                        <p><i class="fa fa-calendar" aria-hidden="true"></i>{{date('d-M-Y',strtotime($event->event_date))}}
                           <i class="fa fa-clock-o" aria-hidden="true"></i>{{date('H:i',strtotime($event->event_date))}}</p>

                      </div>

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
                    <img src= {{ asset("/upload/image/$category->category_photo") }} class="img-responsive" alt=""> </div>
                  <!-- Post Content-->
                  <div class="post-content">
                    <div class="category"><a href="{{ route('categories.show', $category->id) }}">{{$category->category_name}}</a></div>
                    <h2 class="sub_title">{{$category->category_description}}</h2>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
    </section>
    <br><br>



  </div>

@endsection
