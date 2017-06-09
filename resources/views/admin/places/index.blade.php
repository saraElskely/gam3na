@extends('layouts.adminboard')

@section('content')
@if(session()->has('message'))
 <h1 class="alert alert-success"> {{session()->get('message')}}</h1>
  @endif

<a href="places/create" class="btn btn-info">Add New</a>
<table class="table">
<thead>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Description</th>
  <th>Photo</th>
  <th>details_address</th>
  <th>Address</th>
  </tr>
</thead>
<tbody>

  @foreach($places as $place)
  <tr>
  <td>{{$place->id}}</td>
  <td>{{$place->place_name}}</td>
  <td>{{$place->place_description}}</td>

  <td><img src={{asset("/upload/image/$place->place_photo")}} width="42" height="42" ></td>
  <td>{{$place->place_details_address}}</td>
  <td>{{$place->place_address}}</td>




  <td>

    <a href="places/{{$place->id}}/edit">Edit</a>
    <a href="places/{{$place->id}}">Show</a>
   <form action='places/{{$place->id}}' method="POST">
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
