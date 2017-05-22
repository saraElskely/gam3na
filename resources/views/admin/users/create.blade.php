@extends('layouts.adminapp')

@section('content')

<center>
<div > <h1>{{(Route::currentRouteName())}}User</h1></div>
</center>
<center>
<form class="form-horizontal" action="/admin/users/@yield('editid')" method="POST" enctype="multipart/form-data">

{{csrf_field()}}
@section('editmethod')
@show
<div class="form-group">
<label for="name">Name</label>
<input type="text" name="name" value="@yield('editname')">
</div>

<div class="form-group">
<label for="password">password</label>
<input type="password" name="password" value="@yield('editpassword')">
</div>

<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" value="@yield('editemail')">
</div>



<div class="form-group">
<label for="gender">gender</label>
<input type="text" name="gender"value="@yield('editgender')">
</div>



<div class="form-group">
<label for="job">Job</label>
<input type="text" name="job" value="@yield('editjob')">
</div>


<div class="form-group">
<label for="user_photo">user_photo</label>
<input type="file" name="user_photo" value="@yield('edituser_photo')">

</div>

<div class="form-group">
<label for="block">block</label>
<input type="text" name="block" value="@yield('editblock')">
</div>


<div class="form-group">
<label for="date_of_birth">DOB</label>
<input type="date" name="date_of_birth" value="@yield('editdate_of_birth')">
</div>

<button type="submit" class="btn btn-primary">Submit</button>


</form>
@include('admin.users.errors')
</center>
@endsection
