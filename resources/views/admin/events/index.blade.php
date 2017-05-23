@extends('layouts.adminapp')

@section('content')
@if(session()->has('message'))
 <h1 class="alert alert-success"> {{session()->get('message')}}</h1>
  @endif


<table class="table">
<thead>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Description</th>
  <th>Date</th>
  <th>Photo</th>
  <th>Address</th>
  </tr>
</thead>
<tbody>

  @foreach($event as $event)
  <tr>
  <td>{{$event->id}}</td>
  <td>{{$event->event_name}}</td>
  <td>{{$event->event_description}}</td>
  <td>{{$event->event_date}}</td>
  <td><img src={{asset("/upload/image/$event->event_photo")}} width="42" height="42" ></td>
 
  <td>{{$event->event_address}}</td>
   



  <td>

             
    <a href="events/{{$event->id}}">Show</a>
   <form action='events/{{$event->id}}' method="POST">
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
