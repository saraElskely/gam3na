@extends('layouts.adminboard')
@section('content')
    <div class="jumbotron" style=" background-color:#d26868">
          <div class="headDiv">
              <div class="container text-center" >
                <h1 class="fonty" style="color:#ffffff">create Admin</h1>
              </div>
          </div>
    </div>
    <div class="container-fluid text-center">
      <div class="cont content">
        <div class="col-sm-8 text-left">

      <center>
        <form class="col-lg-6 col-lg-offset-4 form-group"  action="/admin/admins"  method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">

                <label for="name"style="color:grey"><h1>Name</h1></label>
                <input type="text" name="name" placeholder="name">
                
            </div>

            <div class="form-group">

                <label for="email" style="color:grey"><h1>Email</h1></label>
                <input type="email" name="email" placeholder="email">

            </div>

            <div class="form-group">

                <label for="password" style="color:grey"><h1>password</h1></label>
                <input type="password" name="password" placeholder="password">

            </div>

            <div class="form-group">
            <input type="file" name="photo">
            </div>

            <button type="submit" class="btn btn-default">Create</button>
        </form>
        </div>
</div>
</div>
</center>
@endsection