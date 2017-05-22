@extends('layouts.adminapp')

@section('content')

<table class="table">
<thead>
<tr>

 
  <th>Name</th>
  <th>Descrption</th>
   <th>Photo</th>
    <th>Subcategory Name</th>
    <th>Subcategory Desc</th>
     <th>Subcategory Photo</th>
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
        {{$category->category_name}}
      </h1>
</td>

  <td>
      <h1>
        {{$category->category_description}}
      </h1>
</td>

<td>
  <img src={{asset("/upload/image/$category->category_photo")}} width="42" height="42" >
</td>


      @foreach($category->subcategories as $subcategory)
      <td>
       {{$subcategory->subcategory_name}}
       </td>
       <td>
       {{$subcategory->subcategory_description}}
       </td>
       <td>
       <img src={{asset("/upload/image/$subcategory->subcategory_photo")}} width="42" height="42">
        </td>
      @endforeach


</tbody>
</table>
@endsection


