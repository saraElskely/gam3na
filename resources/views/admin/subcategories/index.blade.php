@extends('layouts.adminboard')

@section('content')
@if(session()->has('message'))
 <h1 class="alert alert-success"> {{session()->get('message')}}</h1>
  @endif
<a href="subcategories/create" class="btn btn-default">Add New</a>
<br>
      <center>
              <h1 style=color:grey >SubCategories</h1>
                </center>
                <br>

<table  class="table table-bordered drop-shadow lifted">
<thead>
<tr class="rwd-table">
  <th><h1>ID</h1></th>
  <th><h1>Subcategory Name</h1></th>
  <th><h1>Description</h1></th>
  <th><h1>Photo</h1></th>
  <th><h1>Category_Name</h1></th>
  <th><h1>Operation</h1></th>
  </tr>
</thead>
<tbody>

  @foreach($subcategories as $subcategory)

  <tr>
  <td> <h2 id="hash">{{$subcategory->id}}</h2></td>
  <td><a href="subcategories/{{$subcategory->id}}"><h2 id="hash">{{$subcategory->subcategory_name}}</h2></a></td>
  <td><h2 id="hash">{{$subcategory->subcategory_description}}</h2></td>
  
  <td><img src={{asset("/upload/image/$subcategory->subcategory_photo")}} width="42" height="42" ></td>
  <td><h2 id="hash">{{$subcategory->category->category_name}}</h2></td>
  
  <td>
   <a href="subcategories/{{$subcategory->id}}/edit" class="glyphicon glyphicon-pencil" id="hash"></a>
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
