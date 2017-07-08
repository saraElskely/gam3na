@extends('layouts.adminboard')

@section('content')

       <center>
              <br>
              <h1 style=color:grey >Events</h1>
                </center>
                <br>

<table class="table table-bordered  drop-shadow lifted">
<thead>
<tr class="rwd-table">

  <th><h1>{{$event->event_name}}</h1></th>
  <th><h1>Data</h1></th>

 
</tr>
</thead>

<tr>
  <td>
        <h2 >
           Name
        </h2>
</td>

  <td>
        <h2 id="hash">
        {{$event->event_name}}
        </h2>
  </td>
</tr>
<tr>
  <td>
      <h2>Description</h2>
  </td>
  <td>
      <h2 id="hash">
        {{$event->event_description}}
        </h2>
  </td>
  </tr>
  <tr>
  <td>
      <h2> Event Date</h2>
  </td>
  <td>
      <h2 id="hash">
        {{$event->event_date}}
        </h2>
  </td>
  </tr>
    <tr>
  <td>
      <h2>Adress</h2>
  </td>
  <td>
      <h2 id="hash" >
        {{$event->event_address}}
        </h2>
  </td>
  </tr>
    <tr>
  <td>
      <h2>Event Photo</h2>
  </td>
  <td>
      <h2  id="hash">
        {{$event->event_photo}}
        </h2>
  </td>
  </tr>
    <tr>
  <td>
      <h2>EventComment</h2>
  </td>
  
     @foreach($event->comments as $comment)
      <td>

          <h2 id="hash" >
      user name : {{$comment->user->name}}
        </h2>
        <br>
          <h2 id="hash" >
       user comment:{{$comment->comment_content}}
        </h2>
     </td>
   
  @endforeach
  </tr>

      <tr>
  <td>
      <h2>Event Review</h2>
  </td>
  
      @foreach($event->reviews as $review)
      <td>

          <h2 id="hash" >
      user name : {{$review->user->name}}
        </h2>
        <br>
          <h2  id="hash">
       user comment:{{$review->review_content}}
        </h2>
     </td>
   
  @endforeach
  </tr>

</tbody>
</table>
<tbody>


@endsection


