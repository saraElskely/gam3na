@extends('layouts.app')
@section('head')
  <link href={{ asset("web/css/category.css")}} rel="stylesheet" type="text/css">
  <script src={{ asset("web/js/category.js")}}></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('content')

  <header class="main_header">

      <div class="row">
       <div class="content">
          <a class="logo" href="#">GD</a>

          <div class="mobile-toggle">
              <span></span>
              <span></span>
              <span></span>
          </div>


        </div>
      </div> <!-- END row -->

  </header>



<div class="sections " id="wrap">
  <section style="background: url({{ asset("/upload/image/$category->category_photo") }}) no-repeat center center fixed; background-size: cover;" id="hero" id="main">
    <div class="overlay-desc">
       <div class="opacity text-center">
         <h1 class="font">Category </h1>
           <h1>{{$category->category_name}}</h1>
         <p></p>
       </div>
    </div>
  </section><!-- END hero -->

<br><br>
  <div class="container">

  <section class="row" id="sec02">
    <div class="col-xs-3">
    <div class="content">
      <div class="naccs">
        <div class="grid">
    @if(! empty($category->subcategories))
      @php
        $first_subcategory = $category->subcategories->first();
      @endphp
         <div class="gc gc--1-of-3">
          <div class="menu">
            @foreach($category->subcategories as $subcategory)
           {{-- <div class="active"><span class="light"></span><span>ftar</span></div> --}}
              <div class="active" subcat='{{$subcategory->id}}' ><span class="light"></span><span>{{ $subcategory->subcategory_name}}</span></div>
           @endforeach
         </div>
        </div>
</div>
</div>
</div>
</div>

    @endif

<div class="col-xs-9">
        <div >
         <ul style="list-style-type:none">

             <li class="active ">
               <div class="events">
                 @if(! $first_subcategory->events()->isEmpty())
                 @foreach ($first_subcategory->events() as $event)
                 <div class="event-block">
                     <div class="event-date eCol">
                       <div class="eDate">{{date('d',strtotime($event->event_date))}}</div>
                       <div class="eMonth">{{date('M',strtotime($event->event_date))}}</div>
                     </div>
                     <div class="event-details eCol">
                       <div class="event-name">
                         <a href="/event/{{$event->id}}/checkevent">
                         {{$event->event_name}}
                       </a>
                       </div>
                       <div class="event-location">
                         <span class="glyphicon glyphicon-map-marker"></span>
                        {{$event->event_address}}
                       </div>

                   </div>
                  </div>
                   @endforeach
                   @endif
               </li>

         </ul>
       </div>

</div>
</div>
</div>
      </div>
      </div>
    </div>
  </div>
</section>

</div >


@endsection
