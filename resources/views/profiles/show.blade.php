@extends('layouts.app')

@section('content')

<table class="table">
<thead>
<tr>
  
  <th>Name</th>
  <th>Email</th>
  <th>Gender</th>
  <th>user_photo</th>
  <th>DOB</th>
  <th>JOB</th>
   <th>Address</th>

  <th>Events created</th>
  <th>Categories</th>
  
 
  </tr>
</thead>
<tbody>

<tr>
  <td>
   
        {{$user->name}}
    
</td>

<td>
{{$user->email}}

</td>
<td>
{{$user->gender}}

</td>
<td>
  <img src={{asset("/upload/image/$user->user_photo")}} width="42" height="42" >
</td>
<td>
{{$user->date_of_birth}}

</td>
<td>
{{$user->job}}

</td>
<td>
{{$user->address}}

</td>
<td>
  @foreach($user->events as $event)
 
   {{$event->event_name}}  
  
   <img src={{asset("/upload/image/$event->event_photo")}} width="42" height="42">
  
  @endforeach

</td>


</tbody>
</table>
@endsection




     