<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v7 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="/create/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="/create/css/style.css">
	</head>
	
	<body>
		
		<a href="{{ url()->previous() }}">BACK</a>
		<div class="wrapper">
			<div class="inner">
				<form action="{{ route('supplier.product.update',$product->id) }}" method="POST" enctype="multipart/form-data">

					@method('PUT')
					@csrf

					<h3>Contact Us</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
					<label class="form-group">
						<input type="text" class="form-control" name="title" required value="{{ $product->title }}">
						<span>Title</span>
						<span class="border"></span>
					</label>

					@error('title')
						{{$message}}
					@enderror

					<label class="form-group">
						<input type="text" class="form-control" name="description"  required value="{{ $product->description }}">
						<span for="">Desciption</span>
						<span class="border"></span>
					</label>
					
					@error('description')
						{{$message}}
					@enderror

					<label class="form-group">
						<input type="text" class="form-control" name="price"  required value="{{ $product->price }}">
						<span for="">Price</span>
						<span class="border"></span>
					</label>
					
					@error('price')
						{{$message}}
					@enderror

					<label class="form-group">
						<input type="text" class="form-control" name="type"  required value="{{ $product->type }}">
						<span for="">Type</span>
						<span class="border"></span>
					</label>

					@error('type')
						{{$message}}
					@enderror

					<label class="form-group">
						<input type="text" class="form-control" name="color"  required value="{{ $product->color }}">
						<span for="">Color</span>
						<span class="border"></span>
					</label>

					@error('color')
						{{$message}}
					@enderror

					<label class="form-group">
						<input type="text" class="form-control" name="quantity"  required value="{{ $product->quantity }}">
						<span for="">Quantity</span>
						<span class="border"></span>
					</label>

					@error('quantity')
						{{$message}}
					@enderror

					<div>__________________</div>

					<label for="">Picture</label>

					<label class="form-group" >
						<input type="file" name="picture" id="">
					</label>

					
					@error('picture')
						{{$message}}
					@enderror

					<button>Create 
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
		

	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>