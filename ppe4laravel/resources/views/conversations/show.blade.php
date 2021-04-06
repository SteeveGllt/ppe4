@extends('welcome')

@section('content')
<div class="container">
    <div class="row">
        @include('conversations.users', ['users' => $users])
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{$user->ville}}</div>
                <div class="card-body conversations">
                </div>
            </div>
        </div>
    </div>
</div>
@stop