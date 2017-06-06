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

				<select name= "subcategory_id" >
					@foreach ($subcategories as $subcategory)
						<option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
					@endforeach

				</select>

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


				<div id="googleMap" style="width:100%;height:400px;">

				</div>
				<input id="lat" name="event_latitude" class="lat" type="hidden" value="@yield('event_latitude')">

				<input id="lng" name="event_longitude" class="lon" type="hidden" value="@yield('event_longitude')">
				 <input id="address" name="event_address" class="adress" type="hidden" value="@yield('event_address')">



				  <br>
		        <button type="submit" class="btn btn-primary">Submit</button>
		      </div>
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

					var geocoder = new google.maps.Geocoder;
					 var address = document.getElementById('address').value;
					var longt = document.getElementById('lng').value;
					var latt = document.getElementById('lat').value;

					latt=parseFloat(latt);
					longt=parseFloat(longt);

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
						google.maps.event.addListener(map, 'click', function(event) {
							// alert(event.latLng);
						    placeMarker(map, event.latLng ,marker,geocoder);
						  });
				}
				function placeMarker(map, location ,marker,geocoder) {
					marker = marker.setPosition(location);
					map.panTo(location);
					$('.lat').val(location.lat());
   				   	$('.lon').val(location.lng());
   				   	        geocoder.geocode({'location': location}, function(results, status) {
					          if (status === 'OK') {
					            if (results[1]) {
					              map.setZoom(11);
					      			$('.adress').val(results[1].formatted_address);
					              // infowindow.setContent(results[1].formatted_address);
					              // infowindow.open(map, marker);
					            } else {
					              window.alert('No results found');
					            }
					          } else {
					            window.alert('Geocoder failed due to: ' + status);
					          }
					        });
				}
			</script>


  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_0JrPnBAl85q8GhoExBWLry7hat2u8p4&callback=myMap"
  type="text/javascript"></script>



     	@include('event.partials.errors')
</div>
@endsection
