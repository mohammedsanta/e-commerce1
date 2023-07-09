@extends('product.index')

@section('content')

    @include('product.sidebar')

		<h4>Latest Products </h4>
			  <ul class="thumbnails flex-wrap">

                @foreach($products as $product)

                    <li class="span3">
                    <div class="thumbnail">
                        <a  href="product_details.html"><img src="{{ Storage::Url($product->picture) }}" alt=""/></a>
                        <div class="caption">
                        <h5>{{ $product->title }}</h5>
                        <p>{{ $product->description }}</p>
                        
                        <h4 style="text-align:center">
                        <a class="btn" href="{{ route('product.show',$product->id) }}">
                            <i class="icon-zoom-in"></i></a> 
						
							@auth

							<form action="{{ route('addtocart',$product->id) }}" method="post">
								@csrf
								<input type="submit" class="btn" href="#" value="Add to">
							</form>
                        
							@endauth

							<a class="btn btn-primary" href="#">${{ $product->price }}</a></h4>
                        </div>
                    </div>
                    </li>

                @endforeach
			  </ul>	

		</div>
		</div>

		<div class="pages">
			{{$products->render("pagination::semantic-ui")}} 
		</div>


@endsection