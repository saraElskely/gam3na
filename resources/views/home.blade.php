@extends('layouts.app')

@section('head')
  <link href={{ asset("web/css/loginHome.css")}} rel="stylesheet" type="text/css">
  <script src={{ asset("web/js/loginHome.js")}}></script>
@endsection

@section('title')
@endsection

@section('nav_menu')
  <li role="presentation"><a href="#">CATEGORIES <span class="badge">42</span></a></li>
  <li role="presentation"><a href="#">NOTIFICATION <span class="badge">3</span></a></li>
  <li role="presentation"><a href="#">PROFILE</a></li>
  <li role="presentation"><a href="{{route('user.calendar')}}"> CALENDER </a></li>

@endsection


@section('content')
  <div class="sections " id="wrap">
    <section id="hero" id="main">
      <h1><span>Category</span><br>Ramadan</h1>
      <div class="mouse">
          <span></span>
      </div>
    </section>


@if(!empty($events))
<section id="activity" class="slide1">
    <h1 class="text-center fonti" style="padding-bottom:4%">Recomended</h1>
    <div class="container">
     @foreach ($events  as $event)
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src={{ asset ("/upload/image/$event->event_photo") }} class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8 par">
                          {{$event->event_description}}

                    </div>
                    <button type="button" class="btn  bton"><span class="glyphicon glyphicon-plus" ></span></button>
                    <div class="bt">
                        <button class="btoni" ><span class="glyphicon glyphicon-ok"></span></button>
                    </div>
                    <div class="hidBtn">
                        <button class="btoni" style="display:none" ><span class="glyphicon glyphicon-plus" ></span></button>
                    </div>
                </div>
            </div>
        </div>
      </div>
         @endforeach
        </div>
</section>
@endif

  <section class="slide">
        <br><br>
    <div class="container slide">
      <div class="row">
        <h1 class="text-center fonti">Your activity</h1>
        <div class="[  ]">
          <ul class="event-list">
            @foreach ($events_attended_by_user as $event)

            <li id="event{{$event->id}}">
              <time datetime="2014-07-20">
                <span class="day">{{date('d',strtotime($event->event_date))}}</span>
                <span class="month">{{date('M',strtotime($event->event_date))}}</span>
                <span class="year">{{date('Y',strtotime($event->event_date))}}</span>
                <span class="time">ALL DAY</span>
              </time>

              <img alt="Independence Day" src={{ asset("/upload/image/$event->event_photo") }} />

              <div class="info">
                <h2 class="title">{{$event->event_name}}</h2>
                <p class="desc">{{$event->event_description}}</p>
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
          </ul>
        </div>
      </div>
    </div>
  </section>

  <div class="accordian">

    <ul>
      @foreach ($user_subscribed_categories as $category)
      <li>
        <div class="image_title">
          <a href="#">{{$category->category_name}}</a>
        </div>
        <a href="{{ route('categories.show', $category->id) }}">
          <img src= {{ asset("/upload/image/$category->category_photo") }} />
        </a>
      </li>
      @endforeach
    </ul>
  </div>
</div>


@endsection
