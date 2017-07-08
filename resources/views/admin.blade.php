@extends('layouts.adminboard')

@section('content')
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" id="dashboard">

                  <span class="small text-uppercase ">Dashboards</span>
                  <h1>Audience Overview</h1>

                </div>

              </div>
              <div class="row">
                <div class="col-sm-12">
                  <hr>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="well user">
                    <div class="row">
                      <div class="col-md-12 col-lg-6">

                        <h2>Users</h2>
                        <h3>{{$user_count}}</h3>

                      </div>
                       <div class="col-md-12 col-lg-6">
                        <span class="glyphicon glyphicon-user" style="font-size: 85px";></span>
                       </div>
                    </div>
                  </div>

                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="well">
                    <div class="row">
                      <div class="col-md-12 col-lg-6">

                        <h2>All Events</h2>
                        <h3>{{$event_count}}</h3>
                      </div>

                      <div class="col-md-12 col-lg-6">
                        <span class="glyphicon glyphicon-asterisk"  style="font-size: 85px"></span>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="well">
                    <div class="row">
                      <div class="col-md-12 col-lg-6">

                        <h2>Places</h2>
                        <h3>{{$place_count}}</h3>
                      </div>

                      <div class="col-md-12 col-lg-6">
                        <span  class=" glyphicon glyphicon-map-marker" style="font-size: 85px"></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">


                  <div class="well">
                    <div class="row">
                      <div class="col-md-12 col-lg-6">

                        <h2>Upcoming Events</h2>
                        <h3>{{$upcoming}}</h3>
                      </div>

                      <div class="col-md-12 col-lg-6">
                        <span class="glyphicon glyphicon-chevron-down" style="font-size: 85px"></span>
                      </div>
                    </div>

                  </div>
                </div>
              </div>


            </div>
          </div>

@endsection
