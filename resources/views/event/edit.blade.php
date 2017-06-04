@extends('event.create')
@section('editId',$item->id)
@section('editTitle',$item->event_name)
@section('editBody',$item->event_description)
@section('editevent_photo',$item->event_photo)
@section('event_latitude',$item->event_latitude)
@section('event_longitude',$item->event_longitude)
@section('event_address',$item->event_address)


@section('editMethod')
	{{method_field('PUT')}}
@endsection

