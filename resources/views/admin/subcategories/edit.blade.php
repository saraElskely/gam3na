
@extends('admin.subcategories.create')


@section('editid',$subcategory->id)
@section('editname', $subcategory->name)
@section('editdescription', $subcategory->description)
@section('editphoto', $subcategory->photo)
@section('editcategory_id', $subcategory->category_id)


@section('editmethod')
{{method_field('PUT')}}
@endsection
