@extends('layouts.app')

@section('head')
  <link href={{ asset("web/css/loginHome.css")}} rel="stylesheet" type="text/css">
  <script src={{ asset("web/js/loginHome.js")}}></script>
@endsection

@section('title')
@endsection

@section('nav_menu')
  <li role="presentation"><a href="#">Category <span class="badge">42</span></a></li>
  <li role="presentation"><a href="#">Notification <span class="badge">3</span></a></li>
  <li role="presentation"><a href="#">Profile</a></li>
  <li role="presentation"><a href="{{route('user.calendar')}}">  Calender</a></li>


@endsection


@section('content')
  <div class="sections " id="wrap">
    <section id="hero" id="main">
      <h1><span>Category</span><br>Ramadan</h1>
      <div class="mouse">
          <span></span>
      </div>
    </section>
           
            

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
                </div>
            </div>
        </div>
        </div>
         @endforeach
        </div>
</section>
    <section>
        <br><br>
      <div class="container">
      <div class="row">
              <h1 class="text-center fonti">Your activity</h1>
        <div class="[  ]">
          <ul class="event-list">
            @foreach ($events_attended_by_user as $event)

            <li>
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
                              <ul class="ulii">
                  <li style="width:33%;">Going <span class="glyphicon glyphicon-ok"></span></li>

                </ul>
              </div>
            </li>
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
          <a href="{{ route('categories.show', $category->id) }}">{{$category->category_name}}</a>
        </div>
        <a href="#">
          <img src= {{ asset("/upload/image/$category->category_photo") }} />
        </a>
      </li>
      @endforeach
    </ul>
  </div>




  </div>

@endsection
