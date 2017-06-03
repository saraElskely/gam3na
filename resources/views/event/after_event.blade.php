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
<div class="rating left">
	 <div class="stars right">
		 <a class="star rated">1</a>
		 <a class="star rated">2</a>
		 <a class="star rated">3</a>
		 <a class="star">4</a>
		 <a class="star">5</a>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
		jQuery(document).ready(function($) {
		  $('.rating .star').hover(function() {
		    $(this).addClass('to_rate');
		    $(this).parent().find('.star:lt(' + $(this).index() + ')').addClass('to_rate');
		    $(this).parent().find('.star:gt(' + $(this).index() + ')').addClass('no_to_rate');
		  }).mouseout(function() {
		    $(this).parent().find('.star').removeClass('to_rate');
		    $(this).parent().find('.star:gt(' + $(this).index() + ')').removeClass('no_to_rate');
		  }).click(function() {
		    $(this).removeClass('to_rate').addClass('rated');
		    $(this).parent().find('.star:lt(' + $(this).index() + ')').removeClass('to_rate').addClass('rated');
		    $(this).parent().find('.star:gt(' + $(this).index() + ')').removeClass('no_to_rate').removeClass('rated');
		    /*Save your rate*/
		    var r = $(this).index()+1;
		    $.ajax({
		      url: "/event/{{ $event->id }}/rating",
		      type: "get",
		      data: {rate:r},
		      success: function(result){
						console.log(result);
		      }
		  });
		});
	});
</script>



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
				@if(!empty( $event->reviews))
					@foreach($event->reviews as $review)
						<li class="list-group">
							{{ $review->review_content }}
						</li>

					@endforeach
				@endif
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
