@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <br>
                    <br>
                    <a href="{{ route('categories.index') }}" class="label label-primary pull-right"> Ctegories </a>
                    {{-- <passport-personal-access-tokens></passport-personal-access-tokens> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

