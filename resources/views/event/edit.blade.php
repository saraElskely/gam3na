@extends('event.create')
@section('editId',$item->id)
@section('editTitle',$item->event_name)
@section('editBody',$item->event_description)
@section('editevent_photo',$item->event_photo)

@section('editMethod')
	{{method_field('PUT')}}
@endsection

