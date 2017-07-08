@extends('layouts.adminboard')

@section('content')
@if(session()->has('message'))
 <h1 class="alert alert-success"> {{session()->get('message')}}</h1>
  @endif

<a href="places/create" class="btn btn-default">Add New</a>
<br> 
<center>
              <h1 style=color:grey >Places</h1>
                </center>
                <br>
<table class="table table-bordered drop-shadow lifted">
<thead>
<tr class="rwd-table">
  <th><h1>ID</h1></th>
  <th><h1>Name</h1></th>
  <th><h1>Description</h1></th>
  <th><h1>Photo</h1></th>
  <th><h1>Details_address</h1></th>
  <th><h1>Address</h1></th>
  </tr>
</thead>
<tbody>

  @foreach($places as $place)
  <tr>
  <td><h2 style=color:grey>{{$place->id}}</h2></td>
  <td><h2 style=color:grey>{{$place->place_name}}</h2></td>
  <td><h2 style=color:grey>{{$place->place_description}}</h2></td>

  <td><img src={{asset("/upload/image/$place->place_photo")}} width="42" height="42" ></td>
  <td><h2 style=color:grey>{{$place->place_details_address}}</h2></td>
  <td><h2 style=color:grey>{{$place->place_address}}</h2></td>




  <td   style=color:grey >

    <a href="places/{{$place->id}}/edit" class="glyphicon glyphicon-pencil"></a>
   
   <form action='places/{{$place->id}}' method="POST" >
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
