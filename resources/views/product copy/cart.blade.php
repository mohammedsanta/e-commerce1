@extends('index')


@section('content')

<table>

    <thead>
        <th>Image</th>
        <th>Title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Action</th>
    </thead>

    <tbody>

    @foreach($products as $cart)

        <tr>

            <td><img src="/pictures/eggs.jpg" style="width: 100px; height: 100px;"></td>
            <td>{{ $cart->products()->get()[0]->title }}</td>
            <td>{{ $cart->products()->get()[0]->description }}</td>
            <td>{{ $cart->products()->get()[0]->price }}</td>
            <td>{{ $cart->quantity }}</td>
            <td>{{ $cart->total }}</td>
            <td class="controller">
                <form action="{{ route('deletefromcart',$cart->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Delete">
                </form>   
            </td>

        </tr>

    @endforeach

    </tbody>
    
</table>

    <form class="form-order" action="{{ route('order') }}" method="POST">
        @csrf
        <input class="order" type="submit" value="Order">
    </form>   

@endsection