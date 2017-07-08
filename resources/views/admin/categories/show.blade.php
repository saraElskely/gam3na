@extends('layouts.adminboard')

@section('content')
        <center>
              <br>
              <h1 style=color:grey >Categories</h1>
                </center>
                <br>

<table class="table table-bordered drop-shadow lifted">
<thead>
<tr class="rwd-table">

 
  <th><h1>Name</h1></th>
  <th><h1>Descrption</h1></th>
   <th><h1>Photo</h1></th>
    <th><h1>Subcategory Name </h1></th>
    <th><h1>Subcategory Desc</h1></th>
     <th><h1>Subcategory Photo</h1></th>
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
        {{$category->category_name}}
      </h2>
</td>

  <td>
      <h2 id="hash">
        {{$category->category_description}}
      </h2>
</td>

<td>
  <h2 >
  <img src={{asset("/upload/image/$category->category_photo")}} width="42" height="42" >
  </h2>
</td>


      @foreach($category->subcategories as $subcategory)
      <td>
      <h2 id="hash">
       {{$subcategory->subcategory_name}}</h2>

       </td>
       <td>
       <h2 id="hash">
       {{$subcategory->subcategory_description}}
       </h2>
       </td>
       <td>
       <h2>
       <img src={{asset("/upload/image/$subcategory->subcategory_photo")}} width="42" height="42">
       </h2>
        </td>
      @endforeach


</tbody>
</table>
@endsection


