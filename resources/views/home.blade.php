@extends('layouts.app')

@section('head')
  <link href={{ asset("web/css/loginHome.css")}} rel="stylesheet" type="text/css">
  <script src={{ asset("web/js/loginHome.js")}}></script>
@endsection

@section('title')
@endsection

@section('content')
  <div class="sections " id="wrap">
    <section id="hero" id="main" >
      <h1><span>Welcome</span><br>Gam3na</h1>

    </section>


@if(!empty($events))
<section id="activity" class="slide1">
    <h1 class="text-center fonti" style="padding-bottom:4%">Recomended Activities</h1>
    <div class="container">

      <div class="row" >
         @foreach ($events  as $event)
          <div class="col-xs-12 col-sm-6 col-md-6" id="event{{$event->id}}">
              <div class="well well-sm">
                  <div class="row">
                      <div class="col-sm-6 col-md-4">
                        <a href="/event/{{$event->id}}/checkevent" >
                          @if ($event->event_photo == 'null')
                            <img src={{ asset ("/web/images/f-01.png") }} class="img-rounded img-responsive" />
                          @else
                          <img src={{ asset ("/upload/image/$event->event_photo") }} class="img-rounded img-responsive" />
                          @endif
                        </a>
                        <i class="fa fa-calendar fa-color"  aria-hidden="true"></i>{{date('d-m-Y',strtotime($event->event_date))}}
                        <i class="fa fa-clock-o fa-color"  aria-hidden="true"></i>{{date('H:i', strtotime($event->event_date))}}
                      </div>
                      <div class="col-sm-6 col-md-8 par">
                        <a href="/event/{{$event->id}}/checkevent" class="ai" >
                            {{$event->event_name}}
                        </a>
                      </div>
                      <div class="col-sm-6 col-md-8 par">
                            <i class="fa fa-map-marker fa-color"  aria-hidden="true"></i>{{$event->event_address}}
                      </div>
                      <button type="button"  id="attendedEvent{{$event->id}}" class="btn  bton"><span class="glyphicon glyphicon-plus" ></span></button>
                  </div>
              </div>
          </div>
          <script>
          $(document).ready(function(){

              $("#attendedEvent{{$event->id}}").click(function(){
                  $.ajax({url: "/event/{{$event->id}}/attendance", success: function(result){
                    if (result){
                      $("#event{{$event->id}}").remove();

                      $('.attend').append('<li id="event{{$event->id}}">\
                        <time datetime="2014-07-20">\
                          <span class="day">{{date('d',strtotime($event->event_date))}}</span>\
                          <span class="month">{{date('M',strtotime($event->event_date))}}</span>\
                          <span class="year">{{date('Y',strtotime($event->event_date))}}</span>\
                          <span class="time">ALL DAY</span>\
                        </time>\
                        <img alt="Independence Day" src={{ asset("/upload/image/$event->event_photo") }} />\
                        <div class="info">\
                          <h2 class="title"><a href="/event/{{$event->id}}/checkevent" class="ai" >{{$event->event_name}}</a></h2>\
                          <p class="desc"><i class="fa fa-map-marker fa-color"  aria-hidden="true"></i>{{$event->event_address}}</p>\
                          <button class="btn  bton" id="{{$event->id}}"><span class="glyphicon glyphicon-ok"></span></button>\
                        </div>\
                      </li>');
                      $("#{{$event->id}}").click(function(){
                          $.ajax({url: "/event/{{$event->id}}/attendance", success: function(result){
                            if (result.attend_status == null){
                              $('#event{{$event->id}}').remove();
                            }
                          }
                        });
                      });
                    }
                  }
                });
              });
          });
          </script>
           @endforeach
        </div>
    </div>
</section>
@endif



  <section class="slide">
        <br><br>
    <div class="container ">
      <div class="row">
        <h1 class="text-center fonti">Your activities</h1>
          <ul class="event-list attend">
            @if(! $events_attended_by_user->isEmpty())
            @foreach ($events_attended_by_user as $event)

            <li id="event{{$event->id}}">
              <time datetime="2014-07-20">
                <span class="day">{{date('d',strtotime($event->event_date))}}</span>
                <span class="month">{{date('M',strtotime($event->event_date))}}</span>
                <span class="year">{{date('Y',strtotime($event->event_date))}}</span>
                <span class="time">ALL DAY</span>
              </time>
              @if ($event->event_photo == 'null')
                <img alt="Independence Day" src={{ asset("/web/images/f-01.png") }} />
              @else
              <img alt="Independence Day" src={{ asset("/upload/image/$event->event_photo") }} />
              @endif
              <div class="info">
                <h2 class="title"><a href="/event/{{$event->id}}/checkevent" class="ai" >{{$event->event_name}}</a></h2>
                <p class="desc"><i class="fa fa-map-marker fa-color"  aria-hidden="true"></i> {{$event->event_address}}</p>
                <button class="btn  bton" id="{{$event->id}}"><span class="glyphicon glyphicon-ok"></span></button>
              </div>
            </li>

            <script>
              $(document).ready(function(){
                  $("#{{$event->id}}").click(function(){
                      $.ajax({url: "/event/{{$event->id}}/attendance", success: function(result){
                        if (result.attend_status == null){
                          $('#event{{$event->id}}').remove();
                        }
                      }
                    });
                  });
                });
              </script>
            @endforeach
            @endif
          </ul>
      </div>
    </div>
  </section>


<br>
  @if(!empty($user_subscribed_categories))
  <section class="slide1">
    <div id="category" class="container text-center rw2">
      <h1 class="fonti" >YOUR CATEGORIES</h1>
      {{-- <br> --}}
      @foreach ($user_subscribed_categories as $category)
        <div class="col-md-4">
           <div class="column">
             <!-- Post-->
             <div class="post-module">
               <!-- Thumbnail-->
               <div class="thumbnail">
                 <img src= {{ asset("/upload/image/$category->category_photo") }} class="img-responsive" alt=""> </div>
               <!-- Post Content-->
               <div class="post-content">
                 <div class="category"><a href="{{ route('categories.show', $category->id) }}">{{$category->category_name}}</a></div>
                 <h1 class="title">{{$category->category_description}}</h1>
               </div>
             </div>
           </div>
         </div>
      @endforeach
  </div>
</section>
  <br>
  <br>
@endif


</div>
@endsection
