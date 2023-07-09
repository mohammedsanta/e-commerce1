@extends('index')


@section('content')

<div class="details">
    
    <img src="/pictures/eggs.jpg" />
    <h2>{{ $product->title }}</h2>
    <p class="description">{{ $product->description }}</p>
    <p class="price">Price: {{ $product->price }} $</p>

    @auth

        <form action="{{ route('addtocart',$product->id) }}" method="post">
            @csrf
            <input class="addtocart" type="submit" value="Add To Cart">
        </form>

        <a href="{{ route('reportView',$product->id) }}">Report</a>

    @endauth

</div>

@endsection