@extends('layouts.app')

@section('content')

<center>
<div > <h1>{{(Route::currentRouteName())}}User</h1></div>
</center>
<center>
<form class="form-horizontal" action="{{route('profile.updateprofile')}}"  method="POST" enctype="multipart/form-data">

{{csrf_field()}}
{{method_field('PUT')}}
@profile
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" value='{{$user->name}}' >
</div>



<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" value='{{$user->email}}' >
</div>



<div class="form-group">
<label for="gender">gender</label>
<input type="text" name="gender" value='{{$user->gender}}'>
</div>



<div class="form-group">
<label for="job">Job</label>
<input type="text" name="job" value='{{$user->job}}' >
</div>


<div class="form-group">
<label for="user_photo">user_photo</label>
<input type="file" name="user_photo" value='{{$user->user_photo}}'>

</div>


<div class="form-group">
<label for="date_of_birth">DOB</label>
<input type="date" name="date_of_birth" value='{{$user->date_of_birth}}'>
</div>

<button type="submit" class="btn btn-primary">Submit</button>


</form>

</center>
@endsection
