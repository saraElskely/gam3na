@extends('layouts.app')

@section('content')

  <div class="row">
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
                              </td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      @endif
      </div>
  </div>


@endsection
