@extends('layouts.adminboard')

@section('content')


<div class="jumbotron" style=" background-color:#d26868">
		  <div class="headDiv">
			  <div class="container text-center" >
			    <h1 class="fonty" style="color:#ffffff">create SubCategory</h1>
			  </div>
		  </div>
	</div>
	<div class="container-fluid text-center">
	  <div class="cont content">
	    <div class="col-sm-8 text-left">

	  <center>
<form class="form-horizontal" action="/admin/subcategories/@yield('editid')" method="POST" enctype="multipart/form-data">

{{csrf_field()}}
@section('editmethod')
@show
<div class="form-group">
<label for="subcategory_name" style="color:grey"><h1>Name</h1></label>
<input type="text" name="subcategory_name" value="@yield('editname')">
</div>
<div class="form-group">
<label for="subcategory_description" style="color:grey"><h1>Description</h1></label>
<input   type="text" name="subcategory_description" value="@yield('editdescription')">
<div class="form-group">

<input type="file" name="subcategory_photo" style="color:grey" value="@yield('editphoto')">
</div>
<div class="form-group">
<label for="category_id" style="color:grey"><h1>category Name</h1></label>
<select id="selectbasic" name="category_id" style="color:grey" value="@yield('editcategory_id')">
  @foreach ($categories as $category)
  <option value="{{$category->id}}"><h1>{{$category->category_name}}</h1></option>
  @endforeach
</select>
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>
<center>
</div>
</div>
</div>

@include('admin.subcategories.errors')
</center>
@endsection
