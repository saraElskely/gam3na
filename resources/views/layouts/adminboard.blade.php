<!DOCTYPE HTML>
<html>
<head>
		<title>Gam3na Dashboard</title>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
		 <link rel="shortcut icon" href={{ asset("images/small%20logo.png")}} />
		<script type="text/javascript" src={{ asset("adminboard/./js/jquery-1.12.4.min.js")}}></script>
		<script type="text/javascript" src={{ asset("adminboard/./fusioncharts/fusioncharts.js")}}></script>
		<script type="text/javascript" src={{ asset("adminboard/./fusioncharts/themes/fusioncharts.theme.zune.js?cacheBust=56")}}></script>
		<script type="text/javascript" src={{ asset("adminboard/./fusioncharts/fusioncharts.jqueryplugin.js")}}></script>
		<link rel="stylesheet" type="text/css" href={{ asset("adminboard/./css/bootstrap.min.css")}}>
		<link rel="stylesheet" type="text/css" href={{ asset("adminboard/./css/bootstrap-theme.min.css")}}>
		<link rel="stylesheet" type="text/css" href={{ asset("adminboard/./css/bootstrap-datetimepicker.css")}}>
		<link rel="stylesheet" type="text/css" href={{ asset("adminboard/./css/main.css")}}>



</head>
<body>
		<nav class="navbar nv ">
  <div class="container-fluid navbar-right ">

     <ul class="nav nav-pills" role="tablist">
          <li role="presentation">
         <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      	  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                      </li>
    </ul>
     </div>
    <div class="container-fluid navbar-left ">
        <div class="col-sm-12 col-md-12 col-lg-5">
           <img src={{ asset("adminboard/images/bosi.jpg")}} alt="" width="70" height="70" style="border-radius:50px">
        </div>
     </div>
     <h3 class="wit">Welcome     {{ Auth::user()->name }} </h3>
    </nav>
        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 hidden" id="loader">
           <center>
              <img src="imgs/ajax-loader.gif">
            </center>
        </div>
        <nav class="navbar navbar-default visible-xs">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
               <button type="button" class="navbar-toggle user-info" data-toggle="collapse" data-target="#useInfo">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </button>
            </div>
             <div class="collapse navbar-collapse" id="useInfo">
              <ul class="nav navbar-nav">
                <li class="text-center">

                </li>
              </ul>
            </div>
          </div>

        </nav>

        <div class="container-fluid">
          <div class="row content">
            <div class="col-sm-3 col-md-3 col-lg-2  sidenav hidden-xs clearfix" id="nav" style="height: 100%">

              <div data-spy="affix" data-offset-top="0" class="sidenav-container">
                <div class="row">
                  <div class="col-sm-12">
                    <p></p>
                  </div>
                </div>

                <div class="row">
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <ul class="nav nav-pills nav-stacked">
											<li><a href="/admin">home</a></li>
                      <li ><a href="/admin/admins">All Admins</a></li>
                      <li ><a href="/admin/users">Users</a></li>
                      <li> <a href="/admin/categories">Categories</a> </li>
                      <li><a href="/admin/subcategories">Subcategories</a></li>
                      <li><a href="/admin/events">Events</a></li>
											<li><a href="/admin/places">Places</a></li>

                    </ul>
                  </div>
                </div>
              </div>

              <br>

            </div>
            <br>

<div class="col-sm-9 col-md-9 col-lg-10" id="contemt-main">

             @yield('content')
</div>
	 <footer class="footer">

	 </footer>
	 <script type="text/javascript" src={{ asset("adminboard/./js/bootstrap.min.js")}}></script>
	 <script type="text/javascript" src={{ asset("adminboard/./js/moment-with-locales.js")}}></script>
	 <script type="text/javascript" src={{ asset("adminboard/./js/bootstrap-datetimepicker.js")}}></script>
     <script type="text/javascript" src={{ asset("adminboard/./js/data.js")}}></script>
     <script type="text/javascript" src={{ asset("adminboard/./js/dashboard.js")}}></script>
          </div>
        </div>
</body>


</html>
