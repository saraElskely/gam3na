@extends('layouts.app')
@include('event.partials.nav')
@section('content')
	<center>

		<ul class="event-list">
		@foreach($user_attendance as $event)
				<br>
			 <li>
			<img alt="Independence Day" src={{ asset("/upload/image/$event->event_photo") }} />
            <div class="info">
            <p class="date">{{$event->event_date}}</p>
            <h2 class="title">{{$event->event_name}}</h2>
             <p class="desc">{{$event->event_description}}</p>
           
        </ul>
        </div>
        	<br>
		
		@endforeach
</center>
@endsection