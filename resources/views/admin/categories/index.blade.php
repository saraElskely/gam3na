@extends('layouts.adminboard')

@section('content')

<a href="categories/create" class="btn btn-default">Add New</a>
<br> 
<center>
              <h1 style=color:grey >Categories</h1>
                </center>
                <br>
<table class="table table-bordered  drop-shadow lifted">
<thead>
<tr class="rwd-table">
  <th><h1>ID</h1></th>
  <th><h1>Name</h1></th>
  <th><h1>Description</h1></th>
  <th><h1>Photo</h1></th>
  <th><h1>Operation</h1></th>
  </tr>
 </thead>
 <tbody>


  @foreach($categories as $category)
  <tr >
  <td><h2 style=color:grey>{{$category->id}}</h2></td>
  <td><a href="categories/{{$category->id}}" id="hash"><h2>{{$category->category_name}}</h2></a></td>
  <td><h2 id="hash">{{$category->category_description}}</h2></td>
  <td> <img src={{asset("/upload/image/$category->category_photo")}} width="42" height="42" ></td>
   <td style=color:grey>
  {{-- <a href="categories/{{$category->id}}">Show</a> --}}
   <a href="categories/{{$category->id}}/edit" id="hash" class= "glyphicon glyphicon-pencil"></a>
   <form action='categories/{{$category->id}}' method="POST">
   {{csrf_field()}}
   {{method_field('DELETE')}}

   <button type="submit" class="glyphicon glyphicon-trash"></button>
   </form>

  </td>

  </tr>
    <td>




  @endforeach

</tbody>
</table>
@endsection
