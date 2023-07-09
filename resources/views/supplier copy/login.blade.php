@extends('index')

@section('content')
    <div class="box-form">
        <form action="{{route('supplier.login')}}" method="POST">

            @csrf
            @method('POST')

            <label for="">Username</label>
            <input type="text" name="name" value="{{old('username')}}">

            @error('name')
                {{$message}}
            @enderror

            
            <label for="">Password</label>
            <input type="text" name="password" value="{{old('description')}}">

            @error('password')
                {{$message}}
            @enderror

            <input type="submit" value="Login">

        </form>
    </div>
@endsection