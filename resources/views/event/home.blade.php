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


						@if($user_attend->where('id', $event->id)->isEmpty())
							<div class="container">
                  <div class="content">
										<button style="border:none;display:none" type="button" id="{{$event->id}}attended" class=" glyphicon glyphicon-ok" ></button>
										<button style="border:none;" type="button" id="{{$event->id}}notAttended" class=" glyphicon glyphicon-plus"></button>
									</div>
								</div>
					@else
						<div class="container">
								<div class="content">
										<button style="border:none;" type="button" id="{{$event->id}}attended" class=" glyphicon glyphicon-ok" ></button>
										<button style="border:none;display:none" type="button" id="{{$event->id}}notAttended" class=" glyphicon glyphicon-plus"></button>
									</div>
								</div>
						@endif

						<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
						<script>
						$(document).ready(function(){
								$("#{{$event->id}}attended").click(function(){
										$.ajax({url: "/event/{{$event->id}}/attendance", success: function(result){
											if (result.attend_status == null){
												$("#{{$event->id}}notAttended").show();
												$("#{{$event->id}}attended").hide();
											}

										}
									});
								});

								$("#{{$event->id}}notAttended").click(function(){

										$.ajax({url: "/event/{{$event->id}}/attendance", success: function(result){
											// alert(result.attend_status);
											if (!result.attend_status){
												$("#{{$event->id}}attended").show();
												$("#{{$event->id}}notAttended").hide();
											}

										}
									});
								});
						});
						</script>







			  </li>
    	@endforeach

		</ul>
		<div style="height:20%">
		</div>
	</div>
@endsection
