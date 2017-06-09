@extends('layouts.app')
{{-- @include('event.partials.nav') --}}
@section('head')
  <link href={{ asset("web/css/event.css")}} rel="stylesheet" type="text/css">
  <script src={{ asset("web/js/event.js")}}></script>
@endsection

@section('content')

	<section>
	    <div class="headDiv" style="background-image: url({{ asset("/upload/image/$event->event_photo") }})">
	        <h1 class="evName fonti">{{$event->event_name}}</h1>
	        <div class="rigBtn">
						{{-- {{dd($event->user_attend_event->where('id','=',Auth::id()))}} --}}
						@if($event->user_attend_event->where('id',Auth::id())->isEmpty())
              <button type="button" class="btn btn-lg btni" >
                 <i class="fa fa-plus-circle" class="top-btn"></i>
               </button>
						@else
              <button type="button" class="btn btn-lg btni" >
                 <i class="fa fa-check" class="top-btn"></i>
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

            <div class="rating left">
              <div class="stars right">
                @php
                  if ($event->averageRating) {
                    $rate = $event->averageRating;
                  }else{
                    $rate = 0;
                  }
                @endphp

                 @for ($i=0; $i < $rate ; $i++)
                   <a class="star rated"></a>
                 @endfor
                 @for ($i=0; $i < 5-$rate; $i++)
                   <a class="star"></a>
                 @endfor
             </div>
          </div>
	    </div>
	</section>

<!-- Container (About Section) -->
	<section class="slide ">
	    <div class="container sec01" >
	        <div class="reveal">
	            <div class= "col-sm-3">
	                <div class="profile-head ">
	                    <h5>{{$event->event_name}}</h5>
	                    <p> Gategory</p>
	                    <ul>
	                        <li><span class="glyphicon glyphicon-briefcase"></span>{{date('d-M-Y',strtotime($event->event_date))}}</li>
	                         <li><span class="glyphicon glyphicon-time"></span>{{date('H:i:s',strtotime($event->event_date))}}</li>
	                        <li><span class="glyphicon glyphicon-map-marker"></span> city</li>
	                        <li><span class="glyphicon glyphicon-home"></span> place</li>
	                        <li><span class="glyphicon glyphicon-phone"></span> <a href="#" title="call">tel</a></li>
	                        <li></li>
	                    </ul>
	                    <button onclick="$('.revealleft,.revealright').toggleClass('revealed');Launch()">Google Map</button>
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
	            <div class="col-sm-9 revealright"  >

	                <h1 class="fonti"> description</h1>
	                <p> {{$event->event_description}}</p>

                    <div class="rating left">
   	                  <div class="stars right">
                         @for ($i=0; $i < $rate ; $i++)
                           <a class="star rated" ></a>
                         @endfor
                         @for ($i=0; $i < 5-$rate; $i++)
                           <a class="star"></a>
                         @endfor
   	                 </div>
   	              </div>


	            </div>

	  </div><!--container close-->
	</section>

	<section id="activity" class="slide">
	    <h1 class="text-center fonti">Reviews</h1>
	    <div class="module-comment-block container">
	      <div class="module-comment-avatar">
	        <img src="images/pp.jpg" alt="My Name" class="myImg" width="50">
	      </div>
	      <div class="cmnt">
	         <form method="post" action="/event/{{$event->id}}/reviews">
						 {{csrf_field()}}
	            <textarea name="review_content" placeeholder="Review our event" id="" cols="120px" rows="3"></textarea>
	            <div class="btoon">
	                <button type="submit" class="btn " >
	                           <span class="hvr-icon-wobble-horizontal">Send</span>
	                </button>
	             </div>
	         </form>
					 @include('event.partials.errors')
	      </div>
	    </div>

			@if(!empty( $event->reviews))
				@foreach($event->reviews as $review)
					<div class="module-comment-block container">
						<div class="module-comment-avatar">
							<img src="images/pp.jpg" alt="My Name" class="myImg" width="50">
						</div>

						<div class="module-comment-text">
							<div><strong>{{ $review->user->name }}</strong></div>
							<div><em>{{date('D',strtotime($review->created_at))}}</em></div>

							<div>
								<pre>{{ $review->review_content }}</pre>
							</div>
								<div class="bottom-comment">
										<div class="comment-date">{{date('d-M-Y',strtotime($review->created_at))}} @ {{date('H:i:s',strtotime($review->created_at))}}</div>
							 </div>
						</div>
					</div> <!-- /module-comment-block -->
				@endforeach
			@endif
</section>

<div class="modal fade " id="uploadPhoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> Upload Photo</h4>
      </div>
      {{-- <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="text-center">
          <img src="images/pp.jpg" class="img-responsive" />
          <input type="file" class="text-center  custom-file-input">
        </div>
      </div> --}}
      <div class="modal-body">
        <form method="post" action="/event/{{$event->id}}/photos" enctype="multipart/form-data">
              {{ csrf_field() }}
           <input type="file" name="user_event_photo" class="text-center  custom-file-input">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
           <button type="submit" class="btn ">
               Upload
           </button>
       </form>
    </div>
    </div>
  </div>
</div>


<section id="activity" class="slide" >
    <div class="container sec03">
    <h1 class="text-center fonti">Images</h1>
            <div class="righti" >
              <button type="button" class="btn btn-lg btni1" data-toggle="modal" data-target="#uploadPhoto" data-whatever="@mdo">
                  <span class="hvr-icon-down">Up load image</span>
               </button>
            </div>
            <br><br>
           <div  class="text-align">
             @if(!empty($event->photos))
               <ul class="card-stacks ">
                 {{-- {{dd($event->photos->count())}} --}}
                 @php
                   $count =$event->photos->count();
                   if($count%3 == 0 ){
                     $div = $count/3;
                   }else{
                     $div = intval($count/3) +1;
                   }
                   $photo_counter=0;
                 @endphp

                 @for ($i = 0; $i < 3 ;$i++ )
                 {{-- @foreach($event->photos as $userEvent_photo) --}}
                  <li class="col-6 col-md-4 text-align">
                    <ul class="cards-down " >
                    @for($j=0; $j < $div and $photo_counter < $count ;$j++)
                      @php
                        $photo = $event->photos[$photo_counter];
                        $photo_counter++;
                      @endphp
                      <li class="card card-1"><img src={{asset("/upload/image/$photo->user_event_photo")}} class="img-shadow-1"/>
                      </li>
                    @endfor
                    </ul>
                  </li>
                @endfor
               </ul>
             @endif
         </div>
    </div>
 </section>


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

@endsection
