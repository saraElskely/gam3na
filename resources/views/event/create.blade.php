@extends('layouts.app')
@section('head')
	    <link href={{ asset ("web/css/calender.css")}} rel="stylesheet" type="text/css">
        <script src={{ asset("web/js/calender.js")}}> </script>
@endsection

@section('content')

	<div class="jumbotron">
		  <div class="headDiv">
			  <div class="container text-center">
			    <h1 class="fonty">create activity</h1>
			  </div>
		  </div>
	</div>

	<div class="container-fluid text-center">
	  <div class="cont content">
	    <div class="col-sm-8 text-left">
				<form class="form-horizontal container" action="/event/@yield('editId')" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
							        @section('editMethod')
								    @show
					<fieldset>
					<!-- Form Name -->
					<legend>Event Form</legend>
					<section id="contact">
							<div class="contact-section">
								<div class="">
								  	<div class="col-md-6 form-line">
			                        <!-- Text input-->
				                        <div class="form-group">
				                          <label class="col-md-4 control-label" for="event_name">Name</label>
				                          <div class="col-md-8">
				                          <input  type="text" name="event_name" id="event_name" placeholder="Event Name" class="form-control input-md" value="@yield('editTitle')" >
				                          </div>
			                           </div>

			                         <div class="form-group">
			                          <label class="col-md-4 control-label" for="textarea">Description</label>
			                          <div class="col-md-8">
			                            <textarea class="form-control" placeholder="Say somthing about your event" id="textarea" name= "event_description" value="@yield('editBody')">@yield('editBody')</textarea>
			                          </div>
			                        </div>

			                        <div class="form-group">
			                          <label class="col-md-4 control-label" for="textinput">Start Date</label>
			                          <div class="col-md-8">
			                          	<input id="textinput" name="event_date" type="datetime-local" placeholder="Start Date" class="form-control input-md" value="@yield('editdate')">
			                          </div>
			                        </div>

			                        <div class="form-group">
			                          <label class="col-md-4 control-label" for="selectbasic">Categories</label>
			                          <div class="col-md-8">
			                            <select id="selectbasic" name="subcategory_id" class="form-control" value="@yield('editsubcategory')">
			                            		@foreach ($subcategories as $subcategory)
			                              <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
			                              @endforeach
			                            </select>
			                          </div>
			                        </div>
						        	 <div class="col-md-6">
			                        <p><input type="file" id="id_photo" "file" name="event_photo"  value="@yield('editevent_photo')" /></p>

											</div>
			            <div id="googleMap" style="width:646px;height:400px;"></div>
									<input id="lat" name="event_latitude" class="lat" type="hidden" value="@yield('event_latitude')">
									<input id="lng" name="event_longitude" class="lon" type="hidden" value="@yield('event_longitude')">
									<input id="address" name="event_address" class="adress" type="hidden" value="@yield('event_address')">

									<div class="form-group">
										<div class=" grpbtn">
												<a href="/event" class="btn btn-info">Cancel</a>
													<button type="submit" class="btn btn-default submit "><i class="fa fa-paper-plane" aria-hidden="true"></i>  Create an Activity</button>
													 </div>
										</div>

							</div>
					       </div>
					    </section>
					</fieldset>
					</form>
				</div>


@if ($places)
		<div class="col-sm-4 sidenav">
			@foreach ($places as $place)
			<div class="well">
						<div class="row">
										<div class="col-sm-6 col-md-4">
												<img src={{ asset("/upload/image/$place->place_photo") }} alt="" class="img-rounded img-responsive" />
										</div>
										<div class="col-sm-6 col-md-8 ">
														<ul class="myUL">
																 <li><span class="glyphicon glyphicon glyphicon-user"></span> {{$place->place_name}}</li>
																<li><span class=" glyphicon glyphicon-pencil"></span> {{$place->place_description}}</li>
																<li><span class="glyphicon glyphicon-home"></span> <span class="place">{{$place->place_address}}</span></li>
																<li><span class="glyphicon glyphicon-map-marker"></span>{{$place->place_details_address}}</li>
																<li><span class="glyphicon glyphicon-phone"></span> tel</li>
																<li></li>
														</ul>
										</div>
						</div>
				</div>
				@endforeach
			</div>

 @endif
</div>
</div>
</div>

</div>
</div>

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

@endsection
