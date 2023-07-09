@extends('index')


@section('content')

    <h1>My Profile</h1>

    <div class="profile">

        <p>Name: {{ $profile->name }}</p>
        <p>Email: {{ $profile->email }}</p>

    </div>

@endsection