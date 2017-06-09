@extends('layouts.adminboard')

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
<label for="subcategory_name">Name</label>
<input type="text" name="subcategory_name" value="@yield('editname')">
</div>
<div class="form-group">
<label for="subcategory_description">Description</label>
<input   type="text" name="subcategory_description" value="@yield('editdescription')">
<div class="form-group">
<label for="subcategory_photo">Photo</label>
<input type="file" name="subcategory_photo" value="@yield('editphoto')">
</div>
<div class="form-group">
<label for="category_id">category_id</label>
<select id="selectbasic" name="category_id" class="" value="@yield('editcategory_id')">
  @foreach ($categories as $category)
  <option value="{{$category->id}}">{{$category->category_name}}</option>
  @endforeach
</select>
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>
@include('admin.subcategories.errors')
</center>
@endsection
