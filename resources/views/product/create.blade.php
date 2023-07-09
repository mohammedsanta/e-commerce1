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
		<link rel="stylesheet" href="/style/style.css">
	</head>

	<body>

		<a class="previous" href="{{ url()->previous() }}">BACK</a>

		<div class="wrapper">
			<div class="inner">


				<form action="{{ route('supplier.product.store') }}" method="POST" enctype="multipart/form-data">

					@csrf

					<h3>Contact Us</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
					<label class="form-group">
						<input type="text" class="form-control" name="title" required>
						<span>Title</span>
						<span class="border"></span>
					</label>

					@error('title')
						{{$message}}
					@enderror

					<label class="form-group">
						<input type="text" class="form-control" name="description"  required>
						<span for="">Desciption</span>
						<span class="border"></span>
					</label>
					
					@error('description')
						{{$message}}
					@enderror

					<label class="form-group">
						<input type="text" class="form-control" name="price"  required>
						<span for="">Price</span>
						<span class="border"></span>
					</label>
					
					@error('price')
						{{$message}}
					@enderror

					<label class="form-group">
						<input type="text" class="form-control" name="type"  required>
						<span for="">Type</span>
						<span class="border"></span>
					</label>

					@error('type')
						{{$message}}
					@enderror

					<label class="form-group">
						<input type="text" class="form-control" name="color"  required>
						<span for="">Color</span>
						<span class="border"></span>
					</label>

					@error('color')
						{{$message}}
					@enderror

					<label class="form-group">
						<input type="text" class="form-control" name="quantity"  required>
						<span for="">Quantity</span>
						<span class="border"></span>
					</label>

					@error('quantity')
						{{$message}}
					@enderror

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