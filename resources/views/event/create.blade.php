@extends('layouts.app')
@include('event.partials.nav')
@section('content')
	<br>
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
				  <input type="text" class="form-control" placeholder="Event will take place in" name="event_address">


				  <br>
		        <button type="submit" class="btn btn-primary">Submit</button>
		      </div>
		    </div>
		  </fieldset>
		</for

     	@include('event.partials.errors')
</div>
@endsection
