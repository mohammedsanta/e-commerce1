@extends('index')


@section('content')

    <h1>My Products</h1>

    
<table>

<thead>

    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>How Many In Cart</th>
        <th>How Many In Order</th>
        <th>Action</th>
    </tr>

</thead>

<tbody> 

    @foreach($products as $product)

        <tr>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ count($cart[$product->id]) }}</td>
            <td>{{ count($order[$product->id]) }}</td>
            <td>
                <a href="{{ route('supplier.product.edit',$product->id) }}">Edit</a>
                <form action="{{ route('supplier.product.destroy',$product->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>

    @endforeach

</tbody>

</table>

@endsection