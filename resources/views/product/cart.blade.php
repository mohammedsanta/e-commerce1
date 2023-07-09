@extends('product.index')


@section('content')

@include('product.sidebar')

<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>  SHOPPING CART</h3>	
	<hr class="soft">
	<!-- <table class="table table-bordered">
		<tbody><tr><th> I AM ALREADY REGISTERED  </th></tr>
		 <tr> 
		 <td>
			<form class="form-horizontal">
				<div class="control-group">
				  <label class="control-label" for="inputUsername">Username</label>
				  <div class="controls">
					<input type="text" id="inputUsername" placeholder="Username">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Password</label>
				  <div class="controls">
					<input type="password" id="inputPassword1" placeholder="Password">
				  </div>
				</div>
				<div class="control-group">
				  <div class="controls">
					<button type="submit" class="btn">Sign in</button> OR <a href="register.html" class="btn">Register Now!</a>
				  </div>
				</div>
				<div class="control-group">
					<div class="controls">
					  <a href="forgetpass.html" style="text-decoration:underline">Forgot password ?</a>
					</div>
				</div>
			</form>
		  </td>
		  </tr>
	</tbody></table>		 -->
			
	<table class="table table-bordered">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Delete</th>
				  <th>Price</th>
                  <th>Discount</th>
                  <th>Tax</th>
                  <th>Total</th>
				</tr>
              </thead>
              <tbody>

                @foreach($products as $product)
                <tr>
                  <td> <img width="60" src="themes/images/products/4.jpg" alt=""></td>
                  <td>{{ $product->product()->get()[0]->title }}<br>Color : black, Material : metal</td>
				  <td>
					<div class="input-append flex">
						<!-- <input class="span1" name="quantity" style="max-width:34px" placeholder="1" id="appendedInputButtons" size="16" type="text"> -->

                    
                    <form class="margin0" action="{{ route('deletefromcart',$product->id) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">
                            <i class="icon-remove icon-white"></i>
                        </button>
                    </form>
                
                </div>
				  </td>
                  <td>${{ $product->product()->get()[0]->price }}</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                  <td>$0.00</td>
                </tr>

                @endforeach
				
                
				
                <tr>
                  <td colspan="6" style="text-align:right">Total Price:	</td>
                  <td> ${{ $total }}</td>
                </tr>
				 <tr>
                  <td colspan="6" style="text-align:right">Total Discount:	</td>
                  <td> $00.00</td>
                </tr>
                 <tr>
                  <td colspan="6" style="text-align:right">Total Tax:	</td>
                  <td> $0.00</td>
                </tr>
				 <tr>
                  <td colspan="6" style="text-align:right"><strong>TOTAL (${{ $total }} - $0 + $0) =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> ${{ $total }} after discount </strong></td>
                </tr>
				</tbody>
            </table>
		
				
	<a href="{{ Url()->previous() }}" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>

	<form action="{{ route('order') }}" method="POST">
		@csrf

		<input type="submit" class="btn btn-large pull-right" value="Buy">		
	</form>
	
</div>

@endsection