@extends('layouts.app')

@section('content')

    <div class="row">
      <div class="col-lg-12">
          @if($errors->any())
              <div class="alert alert-danger">
              @foreach($errors->all() as $error)
                  <p>{{ $error }}</p>
              @endforeach()
              </div>
          @endif
          <div class="panel panel-default">
              <div class="panel-heading">
                 <a href="{{ route('categories.index') }}" class="label label-primary pull-right">All categories</a>
              </div>
              <div class="panel-body">
                  <form action="{{ route('categories.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <div class="form-group">
                          <label class="control-label col-sm-2" >Category Name :</label>
                          <div class="col-sm-10">
                              <input type="text" name="category_name" id="name" class="form-control">
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" >Description</label>
                          <div class="col-sm-10">
                              <textarea name="category_description" id="description" class="form-control"></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" >Photo</label>
                          <div class="col-sm-10">
                              <input type="file" name="category_photo" id="photo" class="form-control">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                              <input type="submit" class="btn btn-default upload-image" value="Add Category" />
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  {{--<script type="text/javascript">--}}

    {{--$("body").on("click",".upload-image",function(e){--}}
      {{--$(this).parents("form").ajaxForm(options);--}}
    {{--});--}}

    {{--var options = {--}}
      {{--complete: function(response)--}}
      {{--{--}}
      	{{--if($.isEmptyObject(response.responseJSON.error)){--}}
      		{{--$("input[name='title']").val('');--}}
      		{{--alert('Image Upload Successfully.');--}}
      	{{--}else{--}}
      		{{--alert('Image Upload failed.');--}}
      	{{--}--}}
      {{--}--}}
    {{--};--}}

  {{--</script>--}}
@endsection
