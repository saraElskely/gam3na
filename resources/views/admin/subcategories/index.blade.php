@extends('layouts.adminboard')

@section('content')
@if(session()->has('message'))
 <h1 class="alert alert-success"> {{session()->get('message')}}</h1>
  @endif
<a href="subcategories/create" class="btn btn-default">Add New</a>
<br><br>
<table  class="rwd-table">
<thead>
<tr class="rwd-table">
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
  <td><a href="subcategories/{{$subcategory->id}}">{{$subcategory->subcategory_name}}</a></td>
  <td>{{$subcategory->subcategory_description}}</td>
  <td>{{$subcategory->category_id}}</td>
  <td><img src={{asset("/upload/image/$subcategory->subcategory_photo")}} width="42" height="42" ></td>

  <td>

   <a href="subcategories/{{$subcategory->id}}/edit" class="glyphicon glyphicon-pencil"></a>
   <form action='subcategories/{{$subcategory->id}}' method="POST">
   {{csrf_field()}}
   {{method_field('DELETE')}}

   <button type="submit" class="glyphicon glyphicon-trash"></button>
   </form>

  </td>
  </tr>

  @endforeach

</tbody>
</table>
@endsection
