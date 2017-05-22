
@extends('admin.categories.create')


@section('editid',$category->id)
@section('editname', $category->category_name)
@section('editdescription', $category->category_description)
@section('editphoto', $category->category_photo)



@section('editmethod')
{{method_field('PUT')}}
@endsection

