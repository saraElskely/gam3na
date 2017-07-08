@extends('layouts.adminboard')

@section('content')
@if(session()->has('message'))
 <h1 class="alert alert-success"> {{session()->get('message')}}</h1>
  @endif

        <center>
              <h1 style=color:grey >Events</h1>
                </center>
                <br>
<table  class="table table-bordered drop-shadow lifted">
<thead>
<tr class="rwd-table">
  <th><h1>ID</h1></th>
  <th><h1>Name</h1></th>
  <th><h1>Description</h1></th>
  <th><h1>Date</h1></th>
  <th><h1>Photo</h1></th>
  <th><h1>Address</h1></th>
  </tr>
</thead>
<tbody>

  @foreach($event as $event)
  <tr>
  <td><h2 id="hash">{{$event->id}}</h2></td>
  <td><h2 id="hash">{{$event->event_name}}</h2></td>
  <td ><div class="des"><h2 id="hash">{{$event->event_description}}</h2></div></td>
  <td><h2 id="hash">{{$event->event_date}}</td>
  <td><img src={{asset("/upload/image/$event->event_photo")}} width="42" height="42" ></td>

  <td><h2 id="hash">{{$event->event_address}}</h2></td>




  <td>
    <a id="hash" href="events/{{$event->id}}">Show</a>
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
