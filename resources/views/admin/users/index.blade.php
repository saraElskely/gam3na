@extends('layouts.adminboard')

@section('content')
@if(session()->has('message'))
 <h1 class="alert alert-success"> {{session()->get('message')}}</h1>
  @endif

<div class="">
                <center>
              <h1 style=color:grey >Users</h1>
                </center>
<table class="table table-bordered drop-shadow lifted">
<thead>

<tr class="rwd-table">
  <th ><h1>ID</h1></th>
  <th  >Name</th>
  <th class="text-center"><h1>Email</h1></th>
  <th class="text-center" ><h1>Gender</h1></th>
  <th class="text-center" ><h1>User Photo</h1></th>
  <th class="text-center" ><h1>BirthDate</h1></th>
  <th class="text-center"><h1>JOB</h1></th>
  <th class="text-center" ><h1>created_at</h1></th>
  <th class="text-center" ><h1>Block</h1></th>
  </tr>
</thead>
<tbody>

  @foreach($users as $user)
<tr class="text-center">
  <td ><h2 style=color:grey>{{$user->id}}</h2></td>
  <td ><a href="users/{{$user->id}}" style=color:grey> <h3>{{$user->name}}</h3></a></td>
  <td><h2 style=color:grey>{{$user->email}}</h2></td>
  <td ><h2 style=color:grey>{{$user->gender}}</h2></td>
  <td ><img src={{asset("/upload/image/$user->user_photo")}} width="42" height="42" ></td>
  <td ><h2 style=color:grey>{{$user->date_of_birth}}</h2></td>
  <td><h2 style=color:grey>{{$user->job}}</h2></td>
<td><h2 style=color:grey>{{$user->created_at->diffforHumans()}}</h2></td>

  <td>
  @if($user->block == 1)
  <div class="text-center"  style="display:inline-block">
    <div class="content">
  <button style="border:none;display:none" type="button" id="{{$user->id}}block" class="glyphicon glyphicon-ban-circle" > </button>
  <button style="border:none;" type="button" id="{{$user->id}}unblock" class="glyphicon glyphicon-ok-sign"> </button>
  </div>
  </div>
   @else
         <div class="text-center">
    <div class="content" style="display:inline-block">
  <button style="border:none;" type="button" id="{{$user->id}}block" class="glyphicon glyphicon-ban-circle"> </button>
  <button style="border:none;display:none" type="button" id="{{$user->id}}unblock" class="glyphicon glyphicon-ok-sign"> </button>
  </div>
  </div>
  @endif
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

     <script>
              $(document).ready(function(){

                  $("#{{$user->id}}block").click(function(){

                      $.ajax({url: "{{ route('admin.block',$user->id) }}", success: function(result){

                          $("#{{$user->id}}unblock").show();
                          $("#{{$user->id}}block").hide();


                      }
                    });
                  });

                  $("#{{$user->id}}unblock").click(function(){
                      $.ajax({url: "{{route('admin.unblock',$user->id)  }}", success: function(result){

                          $("#{{$user->id}}block").show();
                           $("#{{$user->id}}unblock").hide();



                      }
                    });
                  });
              });
              </script>

  </td>
  <br>
  </tr>

  @endforeach

</tbody>
</table>
@endsection
</div>
