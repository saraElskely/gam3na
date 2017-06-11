@extends('layouts.app')

@section('title')
@endsection
@section('head')
  <script src={{ asset("web/js/script.js")}}></script>
@endsection

@section('content')
  <section>
  <div class="video-container">
  	   <video autoplay loop muted>
  		     <source src= {{ asset("web/video/Sequence%2001_x264.mp4") }} type="video/mp4">
  		     Your browser does not support the video tag.
  	   </video>
       <div class="overlay-desc">
          <div class="opacity text-center">
            <h1 class="font">Bored...? </h1>
              <h1>Not any more</h1>
            <p></p>
            <form>
              <div class="input-group">

                <div class="input-group-btn">
                  <button type="button" class="btn btn-danger">Creat an Activity</button>
                  <button type="button" class="btn ">Find a partner</button>
                </div>
              </div>
            </form>
          </div>
       </div>
  </div>
  </section>


  <!-- Container (About Section) -->
  <div id="about" class="container-fluid ">
      <div class="container">
        <div class="row text-center  ">

          <h2 class="fonti">About </h2><br>
          <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4><br>
          <br><button class="btn btn-default btn-lg">Get in Touch</button>
        </div>
      </div>
  </div>


@if(!empty($categories))

  <div id="category" class="container text-center rw2">
    <h2 class="fonti" >CATEGORIES</h2>
    <h4>What we offer</h4>
    <br>

@foreach($categories as $category)
    <div class="col-md-4">
       <div class="column">
         <!-- Post-->
         <div class="post-module">
           <!-- Thumbnail-->
           <div class="thumbnail">
             <img src= {{ asset("/upload/image/$category->category_photo") }} class="img-responsive" alt=""> </div>
           <!-- Post Content-->
           <div class="post-content">
             <div class="category">{{$category->category_name}}</div>
             <h1 class="title">{{$category->category_name}}</h1>
           </div>
         </div>
       </div>
     </div>
@endforeach
</div>
@endif

  <div id="pricing" class="container-fluid ">
    <div class="text-center">
      <h2 class="fonti" >Our Team</h2>
    </div>
    <div class="container ">
    <div class="col-sm-3 col-xs-12 ">
        <div class=" text-center">
          <div >
             <img src=  {{ asset("web/images/bosi.jpg") }} class="small"/>
          </div>
          <div >
            <h3>Sara</h3>
            <h4>OS Devolper</h4>
          </div>
        </div>
      </div>
        <div class="col-sm-3 col-xs-12 ">
        <div class=" text-center">
          <div >
             <img src={{ asset("web/images/bosi.jpg") }} class="small"/>
          </div>
          <div >
            <h3>Basant Gamal</h3>
            <h4>UI Devolper</h4>
          </div>
        </div>
      </div>
         <div class="col-sm-3 col-xs-12 ">
        <div class=" text-center">
          <div >
             <img src={{ asset("web/images/bosi.jpg") }} class="small"/>
          </div>
          <div >
            <h3>Esraa Hassan</h3>
            <h4>OS Devolper</h4>
          </div>
        </div>
      </div>
          <div class="col-sm-3 col-xs-12 ">
        <div class=" text-center">
          <div >
             <img src={{ asset("web/images/bosi.jpg") }} class="small"/>
          </div>
          <div >
            <h3>Salma </h3>
            <h4>OS Devolper</h4>
          </div>
        </div>
      </div>
      </div>
    </div>


    <!-- Container (Contact Section) -->
    <div id="contact" class="container-fluid bg-grey">
      <h2 class="text-center fonti">CONTACT</h2>
      <div class="container">
        <div class="col-sm-5 ">
          <p>Contact us and we'll get back to you within 24 hours.</p>
          <p><span class="glyphicon glyphicon-map-marker"></span> ITI</p>
          <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
          <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
        </div>
        <div class="col-sm-7 slideanim">
          <div class="row">
            <div class="col-sm-6 form-group">
              <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
            </div>
            <div class="col-sm-6 form-group">
              <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
            </div>
          </div>
          <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
          <div class="row">
            <div class="col-sm-12 form-group">
              <button class="btn pull-right" type="submit">Send</button>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
