@extends('layouts.adminboard')

@section('content')

<table class="table">
<thead>
<tr>

  <th>Name</th>
  <th>Description</th>
  <th>Date</th>
  <th>Photo</th>
  <th>Address</th>
  <th>Comment</th>
  <th>Review</th>
</tr>
</thead>
<tbody>

<tr>
  <td>
        {{$event->event_name}}
</td>

  <td>
        {{$event->event_description}}
  </td>
   <td>
        {{$event->event_date}}
  </td>


<td><img src={{asset("/upload/image/$event->event_photo")}} width="42" height="42" ></td>

  <td>
        {{$event->event_address}}
  </td>
      @foreach($event->comments as $comment)
      <td>
       {{$comment->comment_content}}
       </td>
         @endforeach

         @foreach($event->reviews as $review)
      <td>
       {{$review->review_content}}
      
      @endforeach


</tbody>
</table>
@endsection


