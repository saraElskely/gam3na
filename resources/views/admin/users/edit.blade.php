
@extends('admin.users.create')


@section('editid',$user->id)
@section('editname', $user->name)
@section('editemail', $user->email)
@section('editjob', $user->job)
@section('editphoto', $user->photo)
@section('editblock', $user->block)
@section('editpassword', $user->password)
@section('editdate_of_birth', $user->date_of_birth)
@section('editgender', $user->gender)

@section('editmethod')
{{method_field('PUT')}}
@endsection
