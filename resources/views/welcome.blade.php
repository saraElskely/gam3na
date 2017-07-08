@extends('layouts.app')

@section('title')
@endsection
@section('head')
  <script src={{ asset("web/js/script.js")}} > </script>
@endsection

@section('content')
  <section>
  <div class="video-container">
  	   <video autoplay loop muted>
  		     <source src= {{ asset("web/video/site.mp4") }} type="video/mp4">
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
                  <button type="button" id='activity'  class="btn btn-danger">Create an Activity</button>
                  <button type="button" id='partner' class="btn ">Find a partner</button>
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
          <h4>The biggest disease known to mankind is loneliness"
Gam3na gathering people to do to do more of what they want to do in life. It is organized around one simple idea: when we get together and do the things that matter to us, we’re at our best and Gam3na does that  It brings people together to do, explore, teach and learn the things that help them come alive.</h4><br>
          <br>
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
            <form action="{{url('/contact')}}" method="POST">
                {{csrf_field()}}
              <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                @if ($errors->has('name'))
                   <span class="help-block">
                       <strong>{{ $errors->first('name') }}</strong>
                   </span>
               @endif
            </div>
            <div class="col-sm-6 form-group">
              <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
              @if ($errors->has('email'))
                  {{redirect("/#contact")}}
                   <span class="help-block">
                       <strong>{{ $errors->first('email') }}</strong>
                   </span>
               @endif
            </div>

          </div>
          <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
            @if ($errors->has('comments'))
                   <span class="help-block">
                       <strong>{{ $errors->first('comments') }}</strong>
                   </span>
               @endif
          <div class="row">
            <div class="col-sm-12 form-group">
              <button class="btn pull-right " value= "send Message"type="submit" >Send</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
              <script>
              $(document).ready(function(){

              $('#activity').on('click',function() {
                var b='{{Auth::guest()}}';
                if(b == 1){
                  $('#login').modal('show');
                }else{
                  window.location.href = '{{url("/event/create")}}';
                }

              });
              $('#partner').on('click',function() {
                var b='{{Auth::guest()}}';
                if(b == 1){
                  $('#login').modal('show');
                }else{
                  window.location.href = '{{url("/event/calendar")}}';
                }

              });

              });
              </script>




@endsection
