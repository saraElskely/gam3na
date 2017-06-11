@extends('layouts.adminboard')
@section('content')
<a href="admins/create" class="btn btn-default">Add New</a>
<br><br>
<table class="rwd-table">
<thead>
<tr >
  <th>ID</th>
  <th>Name</th>
  <th>Email</th>
  <th>photo</th>
  </tr>
</thead>
<tbody>
    @foreach($admins as $admin)
    <tr>
    <td>{{$admin->id}}</td>
    <td>{{$admin->name}}</td>
    <td>{{$admin->email}}</td>
    <td><img src={{asset("/upload/image/$admin->photo")}} width="42" height="42" ></td>



 <td> <form action='admins/{{$admin->id}}' method="POST">
           {{csrf_field()}}
           {{method_field('DELETE')}}

           <button type="submit" class="glyphicon glyphicon-trash"></button>
           </form></td>
    </td>
    </tr>

    </td>
    </tr>

    @endforeach
  </tbody>
  </table>
  @endsection
