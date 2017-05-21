@extends('layouts.app')

@section('content')

  <div class="row">
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
              {{ $category->name}}
              <img src=  {{ asset("/images/$category->photo") }} height="42" width="42">

          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Description:</strong>
              {{ $category->description }}
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Published On:</strong>
              {{ $category->created_at }}
          </div>
      </div>

      @if(!empty($category->Subcategories))
        @foreach($category->Subcategories as $subcategory)
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Subcategory :</strong>
                  {{ $subcategory->name}}
              </div>
          </div>
        @endforeach
      @endif

  </div>

@endsection
