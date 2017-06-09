
@extends('admin.places.create')


@section('editid',$place->id)
@section('editname', $place->place_name)
@section('editdescription', $place->place_description)
@section('editphoto', $place->place_photo)
@section('editaddress', $place->place_address)
@section('editdetailsaddress', $place->place_details_address)
@section('editlongitude', $place->place_longitude)
@section('editlatitude', $place->place_latitude)

@section('editmethod')
{{method_field('PUT')}}
@endsection
