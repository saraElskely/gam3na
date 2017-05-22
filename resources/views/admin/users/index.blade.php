@extends('layouts.adminapp')

@section('content')
@if(session()->has('message'))
 <h1 class="alert alert-success"> {{session()->get('message')}}</h1>
  @endif
<a href="users/create" class="btn btn-info">Add New</a>

<table class="table">
<thead>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Email</th>
  <th>Gender</th>
  <th>user_photo</th>
  <th>DOB</th>
  <th>BLOCK</th>
  <th>JOB</th>
  <th>created_at</th>
  <th>Operation</th>
  </tr>
</thead>
<tbody>

  @foreach($users as $user)
  <tr>
  <td>{{$user->id}}</td>
  <td>{{$user->name}}</td>
  <td>{{$user->email}}</td>
  <td>{{$user->gender}}</td>
  <td><img src={{asset("/upload/image/$user->user_photo")}} width="42" height="42" ></td>
  <td>{{$user->date_of_birth}}</td>
  <td>{{$user->block}}</td>
  <td>{{$user->job}}</td>
<td> {{$user->created_at->diffforHumans()}}</td>

  <td>
    <a href="users/{{$user->id}}">Show</a>
   <a href="users/{{$user->id}}/edit">Edit</a>
   <form action='users/{{$user->id}}' method="POST">
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
