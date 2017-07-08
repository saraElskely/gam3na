@extends('layouts.adminboard')
@section('content')    <center>
              <h1 style=color:grey >Admins</h1>
                </center>
<a href="admins/create" class="btn btn-default">Add New</a>
<br><br>
<table class="table table-bordered drop-shadow lifted">
<thead>
<tr class="rwd-table text-center" >
  <th><h1>ID</h1></th>
  <th><h1>Name</h1></th>
  <th><h1>Email</h1></th>
  <th><h1>photo</h1></th>
  </tr>
</thead>
<tbody>
    @foreach($admins as $admin)
    <tr>
    <td>{{$admin->id}}</td>
    <td>{{$admin->name}}</td>
    <td>{{$admin->email}}</td>
    <td><img src={{asset("/upload/image/$admin->photo")}} width="42" height="42" ></td>
    </tr>

    </td>
    </tr>

    @endforeach
  </tbody>
  </table>
  @endsection
