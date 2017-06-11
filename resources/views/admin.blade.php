@extends('layouts.adminboard')

@section('content')
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4" id="dashboard">

                  <span class="small text-uppercase ">Dashboards</span>
                  <h1>Audience Overview</h1>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
                  <div class="row">
                    <div class='col-sm-12 form-inline datetimepickerwrapper'>
                      <div class="form-group">
                        <label>From</label>
                        <div class='input-group date' id='datetimepicker6'>

                          <input type='text' class="form-control" value="01/05/2017" data-provide="datepicker"  />
                          <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>To</label>
                        <div class='input-group date' id='datetimepicker7'>
                          <input type='text' class="form-control" value="23/05/2017" disabled="true" />
                          <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>

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

                        <h5>Users</h5>
                        <h3>{{$user_count}}</h3>

                      </div>
                      <div class="col-md-12 col-lg-6">
                        <span id="user-chart-container">FusionCharts will render here</span>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="well">
                    <div class="row">
                      <div class="col-md-12 col-lg-6">

                        <h5>All Events</h5>
                        <h3>{{$event_count}}</h3>
                      </div>

                      <div class="col-md-12 col-lg-6">
                        <span id="page-views-chart-container">FusionCharts will render here</span>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">
                  <div class="well">
                    <div class="row">
                      <div class="col-md-12 col-lg-6">

                        <h5>Places</h5>
                        <h3>{{$place_count}}</h3>
                      </div>

                      <div class="col-md-12 col-lg-6">
                        <span id="session-duration-chart-container">FusionCharts will render here</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-3">


                  <div class="well">
                    <div class="row">
                      <div class="col-md-12 col-lg-6">

                        <h5>Upcoming Events</h5>
                        <h3>{{$upcoming}}</h3>
                      </div>

                      <div class="col-md-12 col-lg-6">
                        <span id="bounce-rate-chart-container">FusionCharts will render here</span>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="well"  id="sessions">
                    <h4>Sessions</h4>
                    <p><span id="session-chart-container">FusionCharts will render here</span></p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="well">
                    <h4 >Visitors' Type</h4>
                    <p><span id="visitor-chart-container">FusionCharts will render here</span></p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="well">
                    <h4>Gender</h4>
                    <p><span id="gender-chart-container">FusionCharts will render here</span></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="well">
                    <h4 >Traffic Sources</h4>
                    <p><span id="traffic-chart-container">FusionCharts will render here</span></p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="well">
                    <h4>Age Group</h4>
                    <p><span id="age-chart-container">FusionCharts will render here</span></p>
                  </div>
                </div>
              </div>


            </div>
          </div>

@endsection
