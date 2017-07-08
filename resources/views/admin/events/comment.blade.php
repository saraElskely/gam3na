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

  <th><h1>Name</h1></th>
  <th><h1>Description</h1></th>
  <th><h1>Date</h1></th>
  <th><h1>Photo</h1></th>
  <th><h1>Address</h1></th>
  <th><h1>Comment</h1></th>
  <th><h1>Review</h1></th>
</tr>
</thead>
<tbody>

<tr>
  <td>
        <h2 id="hash">
        {{$event->event_name}}
        </h2>
</td>

  <td>
        <h2 id="hash">
        {{$event->event_description}}
        </h2>
  </td>
   <td>
    <h2 id="hash">
        {{$event->event_date}}
        </h2>
  </td>


<td><img src={{asset("/upload/image/$event->event_photo")}} width="42" height="42" ></td>

  <td>
        <h2 id="hash">
        {{$event->event_address}}
        </h2>
  </td>
      @foreach($event->comments as $comment)
      <td>
        <h2 id="hash">
       {{$comment->comment_content}}
       </h2>
       </td>
         @endforeach

         @foreach($event->reviews as $review)
      <td>
        <h2 id="hash">
       {{$review->review_content}}
        </h2>
      @endforeach


</tbody>
</table>
@endsection


