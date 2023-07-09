@extends('product.index')


@section('content')

@include('product.sidebar')

<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>
	<h3>Settings</h3>	
		<a href="{{ Url()->previous() }}" class="btn btn-large pull-right">
			<i class="icon-arrow-left"></i>
			Continue Shopping
		</a>

		<img src="{{ Auth::user()->profile()->get()[0]->picture }}" width="100px">

	<hr class="soft">
	<table class="table table-bordered">
		<tbody><tr><th> I AM ALREADY REGISTERED  </th></tr>
		 <tr> 
		 <td>
			<form class="form-horizontal" action="{{ route('changePassword') }}" method="POST">
				@csrf
			
				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Old Password</label>
				  <div class="controls">
					<input type="password" id="inputPassword1" placeholder="Password" name="old">
				  </div>
				</div>

				@error('old')
					{{ $message }}
				@enderror

				<div class="control-group">
				  <label class="control-label" for="inputPassword1">New Password</label>
				  <div class="controls">
					<input type="password" id="inputPassword1" placeholder="Password" name="new">
				  </div>
				</div>

				@error('new')
					{{ $message }}
				@enderror

				<div class="control-group">
				  <label class="control-label" for="inputPassword1">Password Confirmation</label>
				  <div class="controls">
					<input type="password" id="inputPassword1" placeholder="Password" name="password_confirmation">
				  </div>
				</div>

				@error('passwordconfirmation')
					{{ $message }}
				@enderror

				<div class="control-group">
				  <div class="controls">
					<button type="submit" class="btn">Change Password</button>
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
	</tbody></table>		
			
	
</div>

@endsection