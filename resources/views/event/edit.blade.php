@extends('event.create')
@section('editId',$item->id)
@section('editTitle',$item->name)
@section('editBody',$item->description)

@section('editMethod')
	{{method_field('PUT')}}
@endsection