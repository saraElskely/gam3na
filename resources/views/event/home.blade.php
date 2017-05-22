@extends('layouts.app')
@include('event.partials.nav')
@section('content')
	<br>
	@include('event.partials.message')
	<a href="event/create" class="btn btn-info">Add New</a>
	<div class="col-lg-6 col-lg-offset-3">
		<h1>Event List</h1>
		<ul class="list-group col-lg-8">
			@foreach($events as $event)
  <li class="list-group-item">
    	<a href="{{'/event/'.$event->id}}">{{$event->event_description}}</a>
    	<span class="pull-right">{{$event->created_at->diffForHumans()}}</span>
    	</li>
    	@endforeach
</ul>

	<ul class="list-group col-lg-4">
			@foreach($events as $event)
  <li class="list-group-item">
    	<a href="{{'/event/'.$event->id.'/edit'}}" class="glyphicon glyphicon-pencil"></a>
    	<form action="{{'/event/'.$event->id}}" class="form-group pull-right" method="post">
    			{{csrf_field()}}
    			{{method_field('DELETE')}}
    			<button style="border:none;" type="submit" class="glyphicon glyphicon-trash"></button>
    	</form>
    	 </li>
    	@endforeach
		</ul>
	</div>
@endsection
