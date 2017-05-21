@extends('layouts.adminapp')

@section('content')

<center>
<div > <h1>{{(Route::currentRouteName())}}Subcategory</h1></div>
</center>
<center>
<form class="form-horizontal" action="/admin/subcategories/@yield('editid')" method="POST" enctype="multipart/form-data">

{{csrf_field()}}
@section('editmethod')
@show
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" value="@yield('editname')">
</div>
<div class="form-group">
<label for="description">Description</label>
<input   type="text" name="description" value="@yield('editdescription')"> 
<div class="form-group">
<label for="photo">Photo</label>
<input type="file" name="photo" value="@yield('editphoto')">
</div>
<div class="form-group">
<label for="category_id">category_id</label>
<input type="text" name="category_id" value="@yield('editcategory_id')">
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>
@include('admin.subcategories.errors')
</center>
@endsection
