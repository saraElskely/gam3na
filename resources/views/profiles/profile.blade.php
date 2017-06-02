@extends('layouts.app')
@section('head')
  <link href={{ asset("web/css/profile.css")}} rel="stylesheet" type="text/css">
  <script src={{ asset("web/js/profile.js")}}></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('content')

  <section>
    <div class="divi">
    </div>
  </section>

  <!-- Container (About Section) -->
  <section id="me">
      <div class="container" style="margin-top: -10%;">
          <div class="profile-head">
              <div class="col-md- col-sm-4 col-xs-12">
                <img src={{asset("/upload/image/$user->user_photo")}} class="img-responsive" >
                <h6>{{$user->name}}</h6>
              </div><!--col-md-4 col-sm-4 col-xs-12 close-->
              <div class="col-md-5 col-sm-5 col-xs-12">
                  <h5>{{$user->name}}</h5>
                  <p>{{$user->job}} </p>
                  <ul>
                      <li><span class="glyphicon glyphicon-briefcase"></span> {{$user->date_of_birth}}</li>
                      <li><span class="glyphicon glyphicon-map-marker"></span>{{$user->gender}}</li>
                      <li><span class="glyphicon glyphicon-home"></span> {{$user->address}}</li>
                      <li><span class="glyphicon glyphicon-phone"></span> <a href="#" title="call">(+021) 956 789123</a></li>
                      <li><span class="glyphicon glyphicon-envelope"></span><a href="#" title="mail">{{$user->email}} </a>
                        <button type="button" class="btn btn-lg btni" data-toggle="modal" data-target="#myModal">
                         Edit Profile
                        </button>
                      </li>
                  </ul>

              </div><!--col-md-8 col-sm-8 col-xs-12 close-->
          </div><!--profile-head close-->
      </div><!--container close-->
  </section>

  <section id="activity">
      <h1 class="text-center fonti"> Activity </h1>
      <div class="container">

      <div class="row">
        @foreach ($user_attendance as $event)
          <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="well well-sm">
                  <div class="row">
                      <div class="col-sm-6 col-md-4">
                          <img src={{ asset("/upload/image/$event->event_photo") }} alt="" class="img-rounded img-responsive" />
                      </div>
                      <div class="col-sm-6 col-md-8 par">
                        {{$event->event_name}} <br>
                        {{$event->event_description}}

                      </div>
                      <button type="button" class="btn  bton">Delete</button>
                  </div>
              </div>
          </div>
      @endforeach
      </div>
    </div>
        <!-- <button type="button" class="btn  bton">load more</button>-->
        <div class="text-center">
                <ul class="pagination">
                  <li class='disabled'> <a href="#">«</a> </li>
                  <li class='active'> <a href="#">1</a> </li>
                  <li> <a href="#">2</a> </li>
                  <li> <a href="#">3</a> </li>
                  <li> <a href="#">4</a> </li>
                  <li> <a href="#">5</a> </li>
                  <li> <a href="#">»</a> </li>
                </ul>
        </div>
      </section>


    <section id="category">
      <div class="container">
          <h1 class="text-center fonti ">Your Category</h1>
          @foreach ($user_subscribtion as $category)
            <div class="col-md-4 text-center ">
              <div class="column">

                <!-- Post-->
                <div class="post-module">
                  <!-- Thumbnail-->
                  <div class="thumbnail">
                    <div class="date"> <a href="#0">
                      <div class="day"><i class="fa fa-times" aria-hidden="true"></i></div>
                      </a> </div>
                    <img src= {{ asset("/upload/image/$category->category_photo") }} class="img-responsive" alt=""> </div>
                  <!-- Post Content-->
                  <div class="post-content">
                    <div class="category"><a href="{{ route('categories.show', $category->id) }}">{{$category->category_name}}</a></div>
                    <h1 class="title">Lorem Ipsum</h1>
                    <h2 class="sub_title">LEAD COORDINATOR</h2>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
          </div>
    </section>


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title fonti" id="myModalLabel">Edit profile</h4>
          </div>
          <div class="modal-body">

        <div class="">
          <!-- left column -->
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="text-center">
              <img src="images/pp.jpg" class="img-responsive" />
              <input type="file" class="text-center  custom-file-input">
            </div>
          </div>
          <!-- edit form column -->
          <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
            <div class="alert alert-info alert-dismissable">
              <a class="panel-close close" data-dismiss="alert">×</a>
              <i class="fa fa-coffee"></i>
              This is an <strong>.alert</strong>. Use this to show important messages to the user.
            </div>
            <h3>Personal info</h3>
            <form class="form-horizontal" role="form">
              <div class="form-group">
                <label class="col-lg-3 control-label"> Name:</label>
                <div class="col-lg-8">
                  <input class="form-control" value="Estela" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Job:</label>
                <div class="col-lg-8">
                  <input class="form-control" value="Silva" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Tel:</label>
                <div class="col-lg-8">
                  <input class="form-control" value="010000010100" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-3 control-label">Email:</label>
                <div class="col-lg-8">
                  <input class="form-control" value="carmenestelasi@gmail.com" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 control-label"></label>
                <div class="col-md-8">
                  <input class="btn btn-primary" value="Save Changes" type="button">
                  <span></span>
                  <input class="btn btn-default" value="Cancel" type="reset">
                </div>
              </div>
              </form>
            </div>
            </div>
          </div>
      </div>
        <div class="modal-footer">
        </div>
    </div>
  </div>

@endsection
