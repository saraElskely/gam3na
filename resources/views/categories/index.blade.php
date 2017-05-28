@extends('layouts.app')

@section('content')

  @if(!empty($categories))

    <div id="category" class="container text-center  ">
      <h2 >CATEGORIES</h2>
      <h4>What we offer</h4>
      <br>

      <div class="row  container slide ">
        @foreach($categories as $category)
          <div class="col-sm-4 slide panel  ">
            <div class="">
              <img class="img-responsive center-block" src= {{ asset("/upload/image/$category->category_photo") }} />
              <h4>{{$category->category_name}}</h4>
              <p>{{$category->created_at}}</p>
              <a href="{{ route('categories.show', $category->id) }}" class="label label-success">Details</a>

              @if($user_subscribe->where('id', $category->id)->isEmpty())
              <div class="container">
                  <div class="content">
                      <button style="border:none;display:none" type="button" id="{{$category->category_name}}subscribed" class="{{$category->category_name}}subscribed glyphicon glyphicon-ok" ></button>
                      <button style="border:none;" type="button" id="{{$category->category_name}}unsubscribed" class="{{$category->category_name}}unsubscribed glyphicon glyphicon-plus"></button>
                  </div>
              </div>
            @else
              {{-- if($user_subscribe->where('id', $category->id)->all()) --}}
                {{-- {{dd($user_subscribe->where('id', $category->id)->all())}}; --}}
              <div class="container">
                  <div class="content">
                      <button style="border:none;" type="button" id="{{$category->category_name}}subscribed" class="{{$category->category_name}}subscribed glyphicon glyphicon-ok" ></button>
                      <button style="border:none;display:none" type="button" id="{{$category->category_name}}unsubscribed" class="{{$category->category_name}}unsubscribed glyphicon glyphicon-plus"></button>
                  </div>
              </div>
              @endif

              <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
              <script>
              $(document).ready(function(){
                  $("#{{$category->category_name}}subscribed").click(function(){
                      $.ajax({url: "{{ route('subscribe', $category->id) }}", success: function(result){
                        if (result.status == null){
                          $("#{{$category->category_name}}unsubscribed").show();
                          $("#{{$category->category_name}}subscribed").hide();
                        }

                      }
                    });
                  });
              });
              $(document).ready(function(){
                  $("#{{$category->category_name}}unsubscribed").click(function(){
                      $.ajax({url: "{{ route('subscribe', $category->id) }}", success: function(result){
                        if (!result.status){
                          $("#{{$category->category_name}}subscribed").show();
                          $("#{{$category->category_name}}unsubscribed").hide();

                        }

                      }
                    });
                  });
              });
              </script>




          </div>
         </div>
        @endforeach
     </div>

  </div>

  @endif


  {{-- <div class="row">
      <div class="col-lg-12">
          @if(Session::has('success_msg'))
          <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
          @endif
      <!-- Posts list -->
      @if(!empty($categories))
          <div class="row">
              <div class="col-lg-12 margin-tb">
                  <div class="pull-left">
                      <h2>Categoies List </h2>
                  </div>
                  <div class="pull-right">
                      <a class="btn btn-success" href="{{ route('categories.create') }}"> Add New</a>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                  <table class="table table-striped task-table">
                      <!-- Table Headings -->
                      <thead>
                          <th width="25%">Name</th>
                          <th width="40%">Description</th>
                          <th width="15%">Created</th>
                          <th width="20%">Action</th>
                      </thead>

                      <!-- Table Body -->
                      <tbody>
                      @foreach($categories as $category)
                          <tr>
                              <td class="table-text">

                                  <div>{{$category->category_name}}</div>
                                <img src=  {{ asset("/upload/image/$category->category_photo") }} height="42" width="42">

                              </td>
                              <td class="table-text">
                                  <div>{{$category->category_description}}</div>
                              </td>
                                  <td class="table-text">
                                  <div>{{$category->created_at}}</div>
                              </td>
                              <td>
                                  <a href="{{ route('categories.show', $category->id) }}" class="label label-success">Details</a>
                                  {{-- <a href="{{ route('categories.destroy', $category->id) }}" class="label label-danger" onclick="return confirm('Are you sure to delete?')">Delete</a> --}}
                              {{-- </td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      @endif
      </div>
  </div> --}}


@endsection
