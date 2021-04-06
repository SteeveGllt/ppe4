@extends('welcome')

@section('content')
<div class="container">
    @include('conversations.users', ['users' => $users])
</div>
@stop