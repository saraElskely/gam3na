
@extends('admin.subcategories.create')


@section('editid',$subcategory->id)
@section('editname', $subcategory->subcategory_name)
@section('editdescription', $subcategory->subcategory_description)
@section('editphoto', $subcategory->subcategory_photo)
@section('editcategory_id', $subcategory->category_id)


@section('editmethod')
{{method_field('PUT')}}
@endsection
