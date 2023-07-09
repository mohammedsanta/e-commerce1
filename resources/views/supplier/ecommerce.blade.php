@extends('supplier.index')

@section('content')


    <div class="products">

        @foreach($products as $product)

            <div class="product">
            
                <img src="{{ Storage::Url($product->picture) }}" />
                <h2>{{ $product->title }}</h2>
                <p class="description">{{ $product->description }}</p>
                <p class="price">Price: {{ $product->price }} $</p>
                <a href="{{ route('supplier.product.show',$product->id) }}">Details</a>
            
            </div>

        @endforeach

    </div>

@endsection