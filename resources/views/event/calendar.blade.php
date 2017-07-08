@extends('layouts.app')

	@section('title')
@endsection

@section('head')
	    <link href={{ asset ("web/css/calender.css")}} rel="stylesheet" type="text/css">
        <script src={{ asset("web/js/calender.js")}}> </script>
@endsection

@section('content')

	<div class="jumbotron" style="background-image: url({{ asset("/web/images/f-01.png") }})">
		<div class="headDiv" >
				<div class="container text-center">
					<h1 class="fonty">My Calender</h1>
				</div>
			</div>
	</div>



	<div class="container-fluid bg-3 text-center">
      <div class="skill_carousel">

    <ul class="tabs" style = "padding-left:0px">
        <li id="tab01" class = "tab" onclick  = "activeTab('01')"> Jan </li>
        <li id="tab02" class = "tab" onclick  = "activeTab('02')"> Feb </li>
        <li id="tab03" class = "tab" onclick  = "activeTab('03')"> Mar </li>
        <li id="tab04" class = "tab" onclick  = "activeTab('04')"> Apr</li>
        <li id="tab05" class = "tab" onclick  = "activeTab('05')"> May </li>
        <li id="tab06" class = "tab" onclick  = "activeTab('06')"> Jun </li>
        <li id="tab07" class = "tab" onclick  = "activeTab('07')"> Jul </li>
        <li id="tab08" class = "tab" onclick  = "activeTab('08')"> Agu</li>
        <li id="tab09" class = "tab" onclick  = "activeTab('09')"> Sept </li>
        <li id="tab10" class = "tab" onclick = "activeTab('10')"> Oct</li>
        <li id="tab11" class = "tab" onclick = "activeTab('11')"> Nov</li>
        <li id="tab12" class = "tab" onclick = "activeTab('12')"> Dec</li>
    </ul>
    	<div class="tab_content">
            <div id="tab1_content">
                <div class="events">
                @if($events)
                @foreach($events as $event)
                    <div class="event-block1">
                        <div class="event-date1 eCol">
                          <div class="eDate">{{date('d',strtotime($event->event_date))}}</div>
                          <div class="eMonth">{{date('M',strtotime($event->event_date))}}</div>
                        </div>
                        <div class="event-details1 eCol">
                          <div class="event-name1"><a href="/event/{{$event->id}}/checkevent">
                          {{$event->event_name}}</a></div>

                          <div  class="" >
														<span class="glyphicon glyphicon-map-marker"></span>
                          {{$event->event_address}}</div>
                        </div>
                    </div>
                @endforeach
                @endif
                <div></div>
                </div>
            </div>
        </div>

          </div>
          </div>

@endsection
