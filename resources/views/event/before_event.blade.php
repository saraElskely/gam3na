
@extends('layouts.app')
@include('event.partials.nav')
@section('content')

<br>

<div class="col-lg-offset-4 col-lg-4"><h1>{{$event->event_name}}</h1>

	<p> {{ $event->user->name }}
		{{$event->event_date}}
		
	</p>
	<p>{{$event->event_description}}</p>
</div>


<img src={{asset("/upload/image/$event->event_photo")}} width="42" height="42" >


	<div class="form-group">
		<div class="col-lg-10">
			<div class="radio">Fite
				<label>
					<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="" >
					Going
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
					Not Interested
				</label>
			</div>
		</div>
	</div>
	<div class="container">
	<div class="comments">
		<ul class="list-group">
			@foreach($event->comments as $comment)
				<li class="list-group">
					{{ $comment->comment_content }}
				</li>

			@endforeach
		</ul>
<div class="card">
		<div class="card-block">
			<form method="post" action="/event/{{$event->id}}/comments">
				{{csrf_field()}}
				<div class="form-group">
					<textarea name="comment_content" placeeholder="your comment here" class="form-controller"></textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Add Comment</button>

				</div>
		</form>

		</div>
		<div class="card">
				<div class="card-block">
						<form method="post" action="/event/{{$event->id}}/reports">
									{{csrf_field()}}
							<div class="form-group">
								<textarea name="report_content" placeeholder="Report this event"class="form-controller"></textarea>
							</div>

								<div class="form-group">
									<button type="submit" class="btn btn-danger">Add Report</button>

							</div>
							</form>

		@endsection