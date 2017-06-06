@extends('layouts.adminboard')

@section('content')
@if(session()->has('message'))
 <h1 class="alert alert-success"> {{session()->get('message')}}</h1>
  @endif
{{--<a href="users/create" class="btn btn-info">Add New</a>--}}

<table class="table">
<thead>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Email</th>
  <th>Gender</th>
  <th>user_photo</th>
  <th>DOB</th>
  <th>BLOCK</th>
  <th>JOB</th>
  <th>created_at</th>
  <th>Operation</th>
  </tr>
</thead>
<tbody>

  @foreach($users as $user)
  <tr>
  <td>{{$user->id}}</td>
  <td>{{$user->name}}</td>
  <td>{{$user->email}}</td>
  <td>{{$user->gender}}</td>
  <td><img src={{asset("/upload/image/$user->user_photo")}} width="42" height="42" ></td>
  <td>{{$user->date_of_birth}}</td>
  <td>{{$user->block}}</td>
  <td>{{$user->job}}</td>
<td> {{$user->created_at->diffforHumans()}}</td>

  <td>
    <a href="users/{{$user->id}}">Show</a>

  @if($user->block == 1)
  <div class="container">
    <div class="content">
  <button style="border:none;display:none" type="button" id="{{$user->id}}block" >block </button>
  <button style="border:none;" type="button" id="{{$user->id}}unblock">unblock </button> 
  </div>
  </div>
   @else
         <div class="container">
    <div class="content">
  <button style="border:none;" type="button" id="{{$user->id}}block" >block </button>
  <button style="border:none;display:none" type="button" id="{{$user->id}}unblock">unblock </button> 
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
  </tr>

  @endforeach

</tbody>
</table>
@endsection
