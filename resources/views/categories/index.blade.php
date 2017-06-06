@extends('layouts.app')

@section('content')

  @if(!empty($categories))

    <div id="category" class="container text-center  ">
      <h3> CATEGORIES </h3>
      <h4>What we offer</h4>
      <br>

      <div class="row  container slide ">
        @foreach($categories as $category)
          <div class="col-md-4">
             <div class="column">
               <!-- Post-->
               <div class="post-module">
                 <!-- Thumbnail-->
                 <div class="thumbnail">
                   @if($user_subscribe->where('id', $category->id)->isEmpty())
                   <div class="date" style="display:none" id="{{$category->id}}subscribed">
                     <div >
                       <div class="day"><i class="fa fa-check" aria-hidden="true"></i></div>
                     </div>
                   </div>
                   <div class="date" id="{{$category->id}}unsubscribed">
                     <div >
                       <div class="day"><i class="fa fa-plus" aria-hidden="true"></i></div>
                     </div>
                   </div>
                 @else
                   <div class="date" id="{{$category->id}}subscribed" >
                     <div >
                       <div class="day"><i class="fa fa-check" aria-hidden="true"></i></div>
                     </div>
                   </div>
                   <div class="date" style="display:none" id="{{$category->id}}unsubscribed">
                     <div >
                       <div class="day"><i class="fa fa-plus" aria-hidden="true"></i></div>
                     </div>
                   </div>
                 @endif

                     <img src= {{ asset("/upload/image/$category->category_photo") }} class="img-responsive" alt="">
                 </div>
                 <!-- Post Content-->
                 <div class="post-content">
                   <a href="{{ route('categories.show', $category->id) }}" >
                     <div class="category">{{$category->category_name}}</div>
                   </a>
                   <h1 class="title">{{$category->category_name}}</h1>
                 </div>
               </div>
             </div>
           </div>


              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
              <script>
              $(document).ready(function(){
                  $("#{{$category->id}}subscribed").click(function(){
                      $.ajax({url: "{{ route('subscribe', $category->id) }}", success: function(result){
                        if (result.status == null){
                          $("#{{$category->id}}unsubscribed").show();
                          $("#{{$category->id}}subscribed").hide();
                        }
                      }
                    });
                  });

                  $("#{{$category->id}}unsubscribed").click(function(){
                      $.ajax({url: "{{ route('subscribe', $category->id) }}", success: function(result){
                        if (!result.status){
                          $("#{{$category->id}}subscribed").show();
                          $("#{{$category->id}}unsubscribed").hide();
                        }
                      }
                    });
                  });
              });
              </script>

        @endforeach
     </div>

  </div>

  @endif


  


@endsection
