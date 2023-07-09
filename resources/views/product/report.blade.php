@extends('index')

@section('content')
    <div class="box-form">
        <form action="{{route('report')}}" method="POST">

            <p class="product-report"> Product:{{ $product->title }}</p>

            @csrf
            @method('POST')

            <label for="">Subject</label>
            <input type="text" name="subject" value="{{old('username')}}">

            @error('name')
                {{$message}}
            @enderror

            
            <label for="">Message</label>
            <input type="text" name="message" value="{{old('description')}}">

            @error('message')
                {{$message}}
            @enderror

            <input type="submit" value="Report">

        </form>
    </div>
@endsection