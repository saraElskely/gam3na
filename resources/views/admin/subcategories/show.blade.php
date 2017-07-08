@extends('layouts.adminboard')

@section('content')
   <center>
              <br>
              <h1 style=color:grey >SubCategories</h1>
                </center>
                <br>

<table class="table table-bordered">
<thead>
<tr class="rwd-table">

  <th><h1>ID</h1></th>
  <th><h1>Name</h1></th>
  <th><h1>Descrption</h1></th>
   <th><h1>Photo</h1></th>
    <th><h1>Category Name</h1></th>
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
      <h2 id="hash">
        {{$subcategory->id}}
      </h2>
</td>

  <td>
      <h2 id="hash" >
        {{$subcategory->subcategory_name}}
      </h2>
</td>

<td>
<h2 id="hash">{{$subcategory->subcategory_description}}
</h2>
</td>
<td>
  <img src={{asset("/upload/image/$subcategory->subcategory_photo")}} width="42" height="42" >
</td>
<td>
<h2 id="hash">

      {{$subcategory->category_id}}
</h2>
</td>
</tbody>
</table>
@endsection


