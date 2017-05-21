@extends('layouts.adminapp')

@section('content')
@if(session()->has('message'))
 <h1 class="alert alert-success"> {{session()->get('message')}}</h1>
  @endif
<a href="subcategories/create" class="btn btn-info">Add New</a>

<table class="table">
<thead>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Description</th>
  <th>Photo</th>
  <th>Category_ID</th>
  <th>Operation</th>
  </tr>
</thead>
<tbody>

  @foreach($subcategories as $subcategory)
  <tr>
  <td>{{$subcategory->id}}</td>
  <td>{{$subcategory->name}}</td>
  <td>{{$subcategory->description}}</td>
  <td>{{$subcategory->category_id}}</td>
  <td><img src={{asset("/upload/image/$subcategory->photo")}} width="42" height="42" ></td>

  <td>
             
    <a href="subcategories/{{$subcategory->id}}">Show</a>
   <a href="subcategories/{{$subcategory->id}}/edit">Edit</a>
   <form action='subcategories/{{$subcategory->id}}' method="POST">
   {{csrf_field()}}
   {{method_field('DELETE')}}

   <button type="submit">Delete</button>
   </form>

  </td>
  </tr>

  @endforeach

</tbody>
</table>
@endsection
