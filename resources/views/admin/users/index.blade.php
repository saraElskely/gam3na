@extends('layouts.adminboard')

@section('content')
@if(session()->has('message'))
 <h1 class="alert alert-success"> {{session()->get('message')}}</h1>
  @endif
{{--<a href="users/create" class="btn btn-info">Add New</a>--}}
<div class="">

<table class="rwd-table">
<thead>

<tr class="rwd-table">
  <th >ID</th>
  <th  >Name</th>
  <th class="text-center">Email</th>
  <th class="text-center" >Gender</th>
  <th class="text-center" >user<br>photo</th>
  <th class="text-center" >BD</th>
  <th class="text-center">BLOCK</th>
  <th class="text-center">JOB</th>
  <th class="text-center" >created<br>at</th>
  <th class="text-center" >Operation</th>
  </tr>
</thead>
<tbody>

  @foreach($users as $user)
<tr class="text-center">
  <td >{{$user->id}}</td>
  <td ><a href="users/{{$user->id}}" >{{$user->name}}</a></td>
  <td>{{$user->email}}</td>
  <td >{{$user->gender}}</td>
  <td ><img src={{asset("/upload/image/$user->user_photo")}} width="42" height="42" ></td>
  <td >{{$user->date_of_birth}}</td>
  <td >{{$user->block}}</td>
  <td>{{$user->job}}</td>
<td > {{$user->created_at->diffforHumans()}}</td>

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
