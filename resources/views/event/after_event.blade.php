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

@if(!empty($event->photos))
  <div class="photos">
	<ul class="list-group">
		@foreach($event->photos as $userEvent_photo)
			<li class="list-group">
				{{ $event->user->name }}, 
              <img src=  {{ asset("upload/image/$userEvent_photo->user_event_photo") }} height="42" width="42"> 

			</li>
		@endforeach
	</ul>
</div>
@endif
<div class="card">
	<div class="card-block">
		<form method="post" action="/event/{{$event->id}}/photos" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
                 <input type="file" name="user_event_photo"  class="form-control">
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Upload photos</button>
			</div>
	</form>
	</div>

		<div class="container">
			<div class="reviews">
				<ul class="list-group">
					@foreach($event->reviews as $review)
						<li class="list-group">
							{{ $review->review_content }}
						</li>

					@endforeach
				</ul>


				<div class="card">
					<div class="card-block">
						<form method="post" action="/event/{{$event->id}}/reviews">
							{{csrf_field()}}
							<div class="form-group">
								<textarea name="review_content" placeeholder="Review our event" class="form-controller"></textarea>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-info">Add Review</button>

							</div>
						</form>

						
						@include('event.partials.errors')

					</div>

				</div>
					</div>
				</div>
	</div>
		</div>
	</div>

	</div>
	</div>
	</div>


@endsection