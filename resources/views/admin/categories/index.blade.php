@extends('layouts.adminapp')

@section('content')

<a href="categories/create" class="btn btn-info">Add New</a>

<table class="table">
<thead>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Description</th>
  <th>Photo</th>
  <th>Operation</th>
  </tr>
 </thead>
 <tbody>
 

  @foreach($categories as $category)
  <tr>
  <td>{{$category->id}}</td>
  <td>{{$category->category_name}}</td>
  <td>{{$category->category_description}}</td>
  <td> <img src={{asset("/upload/image/$category->category_photo")}} width="42" height="42" ></td>
   <td>            
  <a href="categories/{{$category->id}}">Show</a>
   <a href="categories/{{$category->id}}/edit">Edit</a>
   <form action='categories/{{$category->id}}' method="POST">
   {{csrf_field()}}
   {{method_field('DELETE')}}

   <button type="submit">Delete</button>
   </form>

  </td>

  </tr>
    <td>


 

  @endforeach

</tbody>
</table>
@endsection

