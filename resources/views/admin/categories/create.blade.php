@extends('layouts.adminboard')

@section('content')
	    
<div class="jumbotron" style=" background-color:#d26868">
		  <div class="headDiv">
			  <div class="container text-center" >
			    <h1 class="fonty" style="color:#ffffff">create Category</h1>
			  </div>
		  </div>
	</div>
	<div class="container-fluid text-center">
	  <div class="cont content">
	    <div class="col-sm-8 text-left">

	  <center>
<form class="form-horizontal" action="/admin/categories/@yield('editid')" method="POST" enctype="multipart/form-data">

{{csrf_field()}}
@section('editmethod')
@show
<div class="form-group">
<label for="category_name" style="color:grey"><h1>Name</h1></label>
<input type="text" name="category_name"  value="@yield('editname')">
</div>
<div class="form-group">
<label for="category_description" style="color:grey" ><h1>Description</h1></label>
<input   type="text" name="category_description" value="@yield('editdescription')">
<div class="form-group">
<input type="file" style="color:grey" name="category_photo" value="@yield('editphoto')">
</div>


<button type="submit"  class="btn btn-default">Submit</button>

</form>
</div>
</div>
</div>
@include('admin.categories.errors')
</center>
@endsection
