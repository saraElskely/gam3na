
@extends('layouts.app')
{{-- @include('event.partials.nav') --}}
@section('head')
	   <link href={{ asset("web/css/event.css") }} rel="stylesheet" type="text/css">
       <script src={{ asset("web/js/event.js") }} ></script>
@endsection

@section('title')
@endsection

@section('content')

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel"> Report</h4>
		</div>

		<form method="post" action="/event/{{$event->id}}/reports">
		<div class="modal-body">
					{{csrf_field()}}
				<textarea name="report_content" cols="44" rows="3" placeeholder="Report this event" class="form-controller"></textarea>
		</div>
		  <div class="modal-footer">
		    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		    <button type="submit" class="btn btn-primary">Send Message</button>
		  </div>
			</form>

		</div>
	</div>
</div>


	<section>
		<div class="headDiv" style="background-image: url({{ asset("/upload/image/$event->event_photo") }})">

		    <h1 class="evName fonti">{{$event->event_name}}</h1>
		    <div class="rigBtn">
			    @if($event->user_attend_event->where('id', Auth::id())->isEmpty())
						<button type="button" class="btn btn-lg btni" id="event{{$event->id}}notAttended" >
							 <i class="fa fa-plus-circle" class="top-btn"></i>
						 </button>
						 <button type="button" class="btn btn-lg btni" style="display:none" id="event{{$event->id}}attended" >
 							 <i class="fa fa-check" class="top-btn"></i>
 						 </button>
					@else
						<button type="button" class="btn btn-lg btni" id="event{{$event->id}}attended">
							 <i class="fa fa-check" class="top-btn" ></i>
						 </button>
						 <button type="button" class="btn btn-lg btni" style="display:none" id="event{{$event->id}}notAttended">
 							 <i class="fa fa-plus-circle" class="top-btn"></i>
 						 </button>
					@endif
				</div>
				<div class="wrapper">
							<div class="contact-form-page">
							<div class="form-head">
									<div class="header-btn">
												<button type="button"  class="top-btn" href="#"><i class="fa fa-times" class="top-btn"></i></button>
									</div>
							</div>
							<h1 class="fonti">Who are going to Activity</h1>
							@if( ! $event->user_attend_event->isEmpty())
								@foreach ($event->user_attend_event as $user)
									<div class="module-comment-block ">
										<div class="module-comment-avatar1">
											<img src={{ asset("/upload/image/$user->user_photo") }} alt="My Name" class="myImg" width="50">
										</div>
										<div class="module-comment-text1">
											<div>
												<p class="pi"> <a href="{{'/profile/'.$user->id}}">{{$user->name}}</a> </p>
											</div>
										</div>
									</div>
								@endforeach
							@else
								<div class="module-comment-text1 ">
									<div>
										<p class="pi">no user attended {{$event->event_name}} event </p>
									</div>
								</div>
							@endif
						</div>
					<button class="buttom-btn" ><i class="fa fa-users"></i></button>
				</div>

		</div>

</section>


    <section class="slide ">
    <div class="container sec01" >
        <div class="reveal">
            <div class= "col-sm-3">
                <div class="profile-head ">
                <h5>{{$event->event_name}}</h5>

                <ul>
                    <li><span class="glyphicon glyphicon-briefcase"></span>{{date('d-m-Y',strtotime($event->event_date))}}</li>

                     <li><span class="glyphicon glyphicon-time"></span>{{date('H:i', strtotime($event->event_date))}}</li>
                      <li><span class="glyphicon glyphicon-map-marker"></span>{{$event->event_address}}</li>

                </ul>
                      <button onclick="$('.revealleft,.revealright').toggleClass('revealed');Launch()">Google Map<c x/button>
               </div>
            </div><!--col-md-8 col-sm-8 col-xs-12 close-->


             <div class="col-sm-9 "  >

                <h3 class="fonti"> Map</h3>
                 <div id="googleMap" style="width:95%;height:300px;" > </div>
                  <input id="lat" name="event_latitude" class="lat" type="hidden" value={{$event->event_latitude}}>
          				<input id="lng" name="event_longitude" class="lon" type="hidden" value={{$event->event_longitude}}>
          				<input id="address" name="event_address" class="adress" type="hidden" value={{$event->event_address}}>

	              <!--profile-head close-->
	           </div>

        <!--profile-head close-->

            <div class="col-sm-9 revealright"  >

                 <h1 class="fonti"> description</h1>
                <p> {{$event->event_description}}</p>

            </div>

 <!--container close-->
</section>


<section id="activity" class="slide">
    <h1 class="text-center fonti">Comments</h1>
    <div class="module-comment-block container">
  <div class="module-comment-avatar">
    <img src={{ asset ("upload/image/Auth::user_photo()") }}  class="myImg" width="50">
  </div>

  <div class="cmnt">
     <form method="post" action="/event/{{$event->id}}/comments">
     	{{csrf_field()}}
        <textarea name="comment_content" id="" cols="120" rows="3" placeholder="Add comment..."></textarea>
        <div class="btoon">
            <button type="submit" class="btn " >
                       <span class="hvr-icon-wobble-horizontal">Send</span>
            </button>
         </div>
     </form>

  </div>
</div>

@foreach($event->comments as $comment)
		<div class="module-comment-block container">

		  <div class="module-comment-avatar">
		    <img src={{ asset("upload/image/$comment->user->user_photo") }} class="myImg" width="50">
		  </div>

		  <div class="module-comment-text">
		    <div><strong>{{ $comment->user->name }}</strong></div>
		    <div><em>{{date('D',strtotime($event->event_date))}}</em></div>

		    <div>
		      <p> {{ $comment->comment_content }}</p>
		    </div>
		      <div class="bottom-comment">
		          <div class="comment-date">{{date('M d,y @ H:i',strtotime($comment->created_at))}}</div>
		     </div>
		  </div>
		</div> <!-- /module-comment-block -->
	@endforeach

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
						<script>
						$(document).ready(function(){
								$("#event{{$event->id}}attended").click(function(){
										$.ajax({url: "/event/{{$event->id}}/attendance", success: function(result){
											if (result.attend_status == null){
												$("#event{{$event->id}}notAttended").show();
												$("#event{{$event->id}}attended").hide();
											}
										}
									});
								});

								$("#event{{$event->id}}notAttended").click(function(){
										$.ajax({url: "/event/{{$event->id}}/attendance", success: function(result){
											// alert(result.attend_status);
											if (!result.attend_status){
												$("#event{{$event->id}}attended").show();
												$("#event{{$event->id}}notAttended").hide();
											}
										}
									});
								});
						});
					</script>
	<script >
				function myMap() {
			      var uluru = {lat: 31.200092, lng: 29.918739};
			      var address = document.getElementById('address').value;
			      var longt = document.getElementById('lng').value;
			      var latt = document.getElementById('lat').value;

			      var mapProp= {
			          center:new google.maps.LatLng(parseFloat(latt),parseFloat(longt)),
			          zoom:5,
			      };
			      var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

			      var geocoder = new google.maps.Geocoder;

			      if(latt && longt){
			        console.log(latt, longt)
			        var u = {lat: parseFloat(latt), lng: parseFloat(longt)};
			        var marker = new google.maps.Marker({
			              position: u,
			              map: map,
			            });
			        // alert(u.lng);
			      }else{
			        var marker = new google.maps.Marker({
			              position: uluru,
			              map: map,
			            });
			      }

			    }
	</script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_0JrPnBAl85q8GhoExBWLry7hat2u8p4&callback=myMap"
  type="text/javascript"></script>















{{--





 <div class="col-lg-offset-4 col-lg-4"><h1>{{$event->event_name}}</h1>

	<p> {{ $event->user->name }}
		{{$event->event_date}}

	</p>
	<p>{{$event->event_description}}</p>
</div>





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
						</form> --}}

		@endsection
