@extends('layouts.adminboard')

@section('content')
  <section id="me">
      <div class="container" >
          <div class="profile-head">
              <div class="col-md- col-sm-4 col-xs-12">
                <img src={{asset("/upload/image/$user->user_photo")}} class="img-responsive" >
                <h6>{{$user->name}}</h6>
              </div><!--col-md-4 col-sm-4 col-xs-12 close-->
              <div class="col-md-5 col-sm-5 col-xs-12">
                  <ul>
                      <li><span class="glyphicon glyphicon-briefcase"></span>{{$user->date_of_birth}}</li>
                      <li><span class="glyphicon glyphicon-map-marker"></span>{{$user->gender}}</li>
                      <li><span class="glyphicon glyphicon-map-marker"></span>{{$user->address}}</li>
                      <li><span class="glyphicon glyphicon-phone"></span>{{$user->mobile}}</li>
                      <li><span class="glyphicon glyphicon-envelope"></span>{{$user->email}}
                      </li>
                  </ul>

            </div>
        </div>
      </div>
  </section>


  <section id="activity">
      <h1 class="text-center fonti"> Activity </h1>
      <div class="container">
      <div class="row">
      <br>
        @foreach ($user->events_attend_by_user as $event)
          <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="well well-sm">
                  <div class="row">
                      <div class="col-sm-6 col-md-4">
                          <img src={{ asset("/upload/image/$event->event_photo") }} alt="" class="img-rounded img-responsive" />
                      </div>
                      <div class="col-sm-6 col-md-8 par">
                        {{$event->event_name}} <br>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach
      </div>
    </div>
  </section>

@endsection


