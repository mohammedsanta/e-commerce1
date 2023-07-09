@extends('index')


@section('content')

<div class="details">
    
    <img src="/pictures/eggs.jpg" />
    <h2>{{ $product->title }}</h2>
    <p class="description">{{ $product->description }}</p>
    <p class="price">Price: {{ $product->price }} $</p>


    @if(Auth::guard('supplier')->user()->id == $product->supplier_id)

        <a href="{{ route('supplier.product.edit',$product->id) }}">Edit</a>
    
    @endif

</div>

@endsection