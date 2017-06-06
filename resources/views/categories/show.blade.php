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
    <h1><span>Category</span><br>{{$category->category_name}}</h1>
  </section><!-- END hero -->

  <section class="row" id="sec02">
    <div class="content">
      <div class="naccs">
        <div class="grid">
    @if(!empty($category->subcategories))
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

    @endif

        <div class="gc gc--2-of-3">
         <ul class="nacc">

             <li class="active ">
               <div class="events">
                 @foreach ($first_subcategory->events() as $event)
                 <div class="event-block">
                     <div class="event-date eCol">
                       <div class="eDate">{{date('d',strtotime($event->event_date))}}</div>
                       <div class="eMonth">{{date('M',strtotime($event->event_date))}}</div>
                     </div>
                     <div class="event-details eCol">
                       <div class="event-name">
                         {{$event->event_name}}
                       </div>
                       <div class="event-location">
                        {{$event->event_description}}
                       </div>
                       <div class="other-info">

                       </div>
                     </div>
                     <div class="event-action eCol">
                         !
                     </div>
                   </div>
                   @endforeach
                 </div>
               </li>
         </ul>
       </div>

      </div>
    </div>
  </div>
</section>

</div >


@endsection
