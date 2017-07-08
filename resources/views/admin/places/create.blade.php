@extends('layouts.adminboard')

@section('content')

<div class="jumbotron" style=" background-color:#d26868">
      <div class="headDiv">
        <div class="container text-center" >
          <h1 class="fonty" style="color:#ffffff">create place</h1>
        </div>
      </div>
  </div>
  <div class="container-fluid text-center">
    <div class="cont content">
      <div class="col-sm-8 text-left">

    <center>
<form class="form-horizontal" action="/admin/places/@yield('editid')" method="POST" enctype="multipart/form-data">

{{csrf_field()}}
@section('editmethod')
@show
<div class="form-group">
<label for="place_name" style="color:grey"><h1>Name</h1></label>
<input type="text" name="place_name" value="@yield('editname')">
</div>
<div class="form-group">
<label for="place_description" style="color:grey"><h1>Description</h1></label>
<input   type="text" name="place_description" value="@yield('editdescription')">
<div class="form-group">
 
  <input type="file"  style="color:grey"name="place_photo" value="@yield('editphoto')">
</div>

<div id="googleMap" style="width:80%;height:500px;"></div>
<input id="lat" name="place_latitude" class="lat" type="hidden" value="@yield('editlatitude')">
<input id="lng" name="place_longitude" class="lon" type="hidden" value="@yield('editlongitude')">
<input id="address" name="place_address" class="address" type="hidden" value="@yield('editaddress')">

<div class="form-group">
  <label for="place_photo" style="color:grey" ><h1>place details</h1></label>
  <input id="details_address" name="place_details_address" class="adress"  value="@yield('editdetailsaddress')">
</div>


<button type="submit" class="btn btn-primary">Submit</button>

</form>
</form>
</div>
</div>
</div>

</center>

<script>
  // var marker ;
  function myMap() {

    var uluru = {lat: 31.200092, lng: 29.918739};
    var address = document.getElementById('address').value;
    var longt = document.getElementById('lng').value;
    var latt = document.getElementById('lat').value;

    latt=parseFloat(latt);
    longt=parseFloat(longt);
    if(latt && longt){
      var mapProp= {
          center:new google.maps.LatLng(latt,longt),
          zoom:10,
      };
    }else{
      var mapProp= {
          center:new google.maps.LatLng(31.200092,29.918739),
          zoom:10,
      };
    }

    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

    var geocoder = new google.maps.Geocoder;


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
                $('.address').val(results[1].formatted_address);
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
@include('admin.categories.errors')
@endsection
