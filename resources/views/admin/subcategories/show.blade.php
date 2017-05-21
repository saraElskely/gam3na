@extends('layouts.adminapp')

@section('content')

<table class="table">
<thead>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Descrption</th>
   <th>Photo</th>
    <th>CategoryID</th>
  <!-- <th>Gender</th>
 
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
        {{$subcategory->id}}
      </h1>
</td>

  <td>
      <h1>
        {{$subcategory->name}}
      </h1>
</td>

<td>
<h1>{{$subcategory->description}}
</h1>
</td>
<td>
  <img src={{asset("/upload/image/$subcategory->photo")}} width="42" height="42" >
</td>
<td>
<h1>

      {{$subcategory->category_id}}
</h1>
</td>
</tbody>
</table>
@endsection
