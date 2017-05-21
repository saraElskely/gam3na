@extends('event.create')
@section('editId',$item->id)
@section('editTitle',$item->event_name)
@section('editBody',$item->event_description)

@section('editMethod')
	{{method_field('PUT')}}
@endsection