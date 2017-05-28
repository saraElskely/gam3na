@extends('layouts.app')
@include('event.partials.nav')
@section('content')
	<br>





<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_0JrPnBAl85q8GhoExBWLry7hat2u8p4&callback=myMap"></script>
 -->

	<a href="/event" class="btn btn-info">Back</a>
	<div class="col-lg-4 col-lg-offset-4">
		<h1>{{substr(Route::currentRouteName(),6)}} Item</h1>
			<form class="form-horizontal" action="/event/@yield('editId')" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				@section('editMethod')
					@show
		  <fieldset>
		  	<div class="form-group">
		  		<div class="col-lg-10">

		  			<input type="text" name="event_name" class="form-control" placeholder="Event Name" value="@yield('editTitle')">

		  			<br>
		  		</div>

		  	</div>

		    <div class="form-group">
		      <div class="col-lg-10">

		  		 <label for="event_photo">Photo</label>
		  		 <div class="col-sm-10">
                  <input type="file" name="event_photo"  value="@yield('editevent_photo')">
               </div>
		    </div>

		    <div class="form-group">
		      <div class="col-lg-10">
		        <textarea class="form-control" rows="5" id="textArea" name="event_description" placeholder="Say somthing about your event">@yield('editBody')</textarea>
		        <br>
				  <input type="datetime-local"class="form-control" name="event_date">
				  <br>
				  <input type="text" class="form-control" placeholder="Event will take place in" name="event_address">

				<div id="googleMap" style="width:100%;height:400px;">

				</div>  
				<input id="1" name="event_latitude" class="lat" type="hidden" value="@yield('event_latitude')">  

				<input id="2" name="event_longitude" class="lon" type="hidden" value="@yield('event_longitude')">  
				  

				  <br>
		        <button type="submit" class="btn btn-primary">Submit</button>
		      </div>
		    </div>
		  </fieldset>
		</form>

			<script>
				// var marker ;
				function myMap() {
					var uluru = {lat: 31.200092, lng: 29.918739};

					var mapProp= {
					    center:new google.maps.LatLng(31.200092,29.918739),
					    zoom:5,
					};
					var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
					var longt = document.getElementById('2').value;	
					var latt = document.getElementById('1').value;
					
					if(latt && longt){

						var u = {'lat': latt, 'lng': longt};
						var marker = new google.maps.Marker({
				          position: u,
				          map: map
				        });
						alert(u.lng);
					}else{
						var marker = new google.maps.Marker({
				          position: uluru,
				          map: map
				        });
					}

						google.maps.event.addListener(map, 'click', function(event) {
							// alert(event.latLng);
						    placeMarker(map, event.latLng ,marker);
						    
						  });


				}
				function placeMarker(map, location ,marker) {
					alert(location);
					marker = marker.setPosition(location);
					map.panTo(location);
					$('.lat').val(location.lat());  

   				   	$('.lon').val(location.lng());  
   				   	// alert(marker);

					// var infowindow = new google.maps.InfoWindow({
					//     content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
					// });
					// infowindow.open(map,marker);
					
				}
			


			</script>


  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_0JrPnBAl85q8GhoExBWLry7hat2u8p4&callback=myMap"
  type="text/javascript"></script>



     	@include('event.partials.errors')
</div>
@endsection


	
