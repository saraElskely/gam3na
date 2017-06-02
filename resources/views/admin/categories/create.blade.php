@extends('layouts.adminboard')

@section('content')

<center>
<div > <h1>{{(Route::currentRouteName())}}category</h1></div>
</center>
<center>
<form class="form-horizontal" action="/admin/categories/@yield('editid')" method="POST" enctype="multipart/form-data">

{{csrf_field()}}
@section('editmethod')
@show
<div class="form-group">
<label for="category_name">Name</label>
<input type="text" name="category_name" value="@yield('editname')">
</div>
<div class="form-group">
<label for="category_description">Description</label>
<input   type="text" name="category_description" value="@yield('editdescription')">
<div class="form-group">
<label for="category_photo">Photo</label>
<input type="file" name="category_photo" value="@yield('editphoto')">
</div>


<button type="submit" class="btn btn-primary">Submit</button>

</form>
@include('admin.categories.errors')
</center>
@endsection
