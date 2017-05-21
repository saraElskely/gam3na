@extends('layouts.adminapp')

@section('content')

<a href="users/create" class="btn btn-info">Add New</a>

<table class="table">
<thead>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Description</th>
  <th>Photo</th>
  <th>created_at</th>
  <th>Operation</th>
  </tr>
 </thead>
 <tbody>

  @foreach($categories as $category)
  <tr>
  <td>{{$category->id}}</td>
  <td>{{$category->name}}</td>
  <td>{{$category->description}}</td>
  <td>{{$category->description}}</td>
  </tr>

  @endforeach

</tbody>
</table>
@endsection
