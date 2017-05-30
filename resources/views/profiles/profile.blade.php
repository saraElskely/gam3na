@extends('layouts.app')

@section('content')

  <ul class="event-list">
    @foreach ($user_attendance as $event)

    <li>
      <time datetime="2014-07-20">
        <span class="day">4</span>
        <span class="month">Jul</span>
        <span class="year">2014</span>
        <span class="time">ALL DAY</span>
      </time>
      <img alt="Independence Day" src={{ asset("/upload/image/$event->event_photo") }} />
      <div class="info">
        <h2 class="title">{{$event->event_name}}</h2>
        <p class="desc">{{$event->event_description}}</p>
                      <ul class="ulii">
          <li style="width:33%;">Going <span class="glyphicon glyphicon-ok"></span></li>

        </ul>
      </div>
    </li>
    @endforeach
  </ul>
<table class="table">
<thead>
<tr>
  <a href="{{route('profile.editprofile')}}">Edit</a>

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
