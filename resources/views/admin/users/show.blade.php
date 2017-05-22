@extends('layouts.adminapp')

@section('content')

<table class="table">
<thead>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Email</th>
  <!-- <th>Gender</th>
  <th>user_photo</th>
  <th>DOB</th>
  <th>BLOCK</th>
  <th>JOB</th>
  <th>Operation</th> -->
  </tr>
</thead>
<tbody>

<tr>
  <td>
      <h1>
        {{$user->id}}
      </h1>
</td>

  <td>
      <h1>
        {{$user->name}}
      </h1>
</td>

<td>
<h1>{{$user->email}}
</h1>
</td>
</tbody>
</table>
@endsection
