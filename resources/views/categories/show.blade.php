@extends('layouts.app')

@section('content')
<div class="container" >
  <div class="jumbotron" style="background-color:#b6ccce">

      <h1>{{ $category->category_name}}</h1>
      <p>{{ $category->category_description }}</p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">Subscribe</a></p>
    </div>
  </div>

  <div class="container">
@if(!empty($category->subcategories))
  <div class="row  container slide ">
    @foreach($category->subcategories as $subcategory)
      <div class="col-sm-4 slide panel  ">
        <div class="">
          <img class="img-responsive center-block" src= {{ asset("/upload/image/$subcategory->subcategory_photo") }} />
          <h4>{{ $subcategory->subcategory_name}}</h4>
          <p>{{$subcategory->created_at}}</p>
          {{-- <a href="{{ route('categories.show', $category->id) }}" class="label label-success">Details</a> --}}
      </div>
     </div>
    @endforeach
 </div>
   @endif
 </div>






  {{-- <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Category</h2>
          </div>
          <div class="pull-right">
              <a href="{{ route('categories.index') }}" class="label label-primary pull-right"> Back</a>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Name:</strong>
              {{ $category->category_name}}
              <img src=  {{ asset("upload/image/$category->category_photo") }} height="42" width="42">


          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Description:</strong>
              {{ $category->category_description }}
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Published On:</strong>
              {{ $category->created_at }}
          </div>
      </div>

      @if(!empty($category->subcategories))
        @foreach($category->subcategories as $subcategory)
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Subcategory :</strong>
                  {{ $subcategory->subcategory_name}}
              </div>
          </div>
        @endforeach
      @endif

  </div> --}}

@endsection
