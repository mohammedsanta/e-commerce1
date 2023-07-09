@extends('index')

@section('content')

<div class="products">

    @foreach($products as $product)

        <div class="product">
        
            <img src="/pictures/eggs.jpg" />
            <h2>{{ $product->title }}</h2>
            <p class="description">{{ $product->description }}</p>
            <p class="price">Price: {{ $product->price }} $</p>
            <a href="{{ route('product.show',$product->id) }}">Details</a>
        
        </div>

    @endforeach

</div>


@endsection