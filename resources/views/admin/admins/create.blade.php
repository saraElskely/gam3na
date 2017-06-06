@extends('layouts.adminboard')
@section('content')
    <br>
        <form class="col-lg-6 col-lg-offset-4 form-group"  action="/admin/admins"  method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">

                <label for="name">Name</label>
                <input type="text" name="name" placeholder="name">
                
            </div>

            <div class="form-group">

                <label for="email">Email</label>
                <input type="email" name="email" placeholder="email">

            </div>

            <div class="form-group">

                <label for="password">password</label>
                <input type="password" name="password" placeholder="password">

            </div>

            <div class="form-group">

            <label for="photo">photo</label>
            <input type="file" name="photo">

            </div>

            <button type="submit" class="btn btn-default">Create</button>
        </form>
@endsection