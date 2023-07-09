<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->
	
<!-- Bootstrap style --> 
    <link id="callCss" rel="stylesheet" href="/customer/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="/customer/themes/css/base.css" rel="stylesheet" media="screen"/>
	<!-- Bootstrap style responsive -->	
	<link href="/customer/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="/customer/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
	<!-- Google-code-prettify -->	
	<link href="/customer/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
	<!-- fav and touch icons -->
    <link rel="shortcut icon" href="/customer/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/customer/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/customer/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/customer/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/customer/themes/images/ico/apple-touch-icon-57-precomposed.png">
	<style type="text/css" id="enject"></style>
    <link rel="stylesheet" href="/style/style.css">
  </head>
<body>
<div id="header">
<div class="container">

<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="{{ route('home') }}"><img src="/pictures/ecommerce.jpg" width="70px"/></a>
		<!-- <form class="form-inline navbar-search" method="post" action="products.html" >
		<input id="srchFld" class="srchTxt" type="text" />
		  <select class="srchTxt">
			<option>All</option>
			<option>CLOTHES </option>
			<option>FOOD AND BEVERAGES </option>
			<option>HEALTH & BEAUTY </option>
			<option>SPORTS & LEISURE </option>
			<option>BOOKS & ENTERTAINMENTS </option>
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
    	</form> -->
    <ul id="topMenu" class="nav pull-right">
	 <!-- <li class=""><a href="special_offer.html">Specials Offer</a></li> -->
	 <li class=""><a href="{{ route('contact') }}">Contact</a></li>
	 
	 @Auth
	 
	 <li class=""><a href="{{ route('settings') }}">Settings</a></li>

	 	<form class="flex" action="{{ route('auth.logout') }}" method="POST">
			@csrf
			<input type="submit" class="btn btn-large btn-success" value="Logout">
		</form>

	 @else

	<li class="">

		<a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
		<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Login Block</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal loginFrm" action="{{ route('auth.login') }}" method="POST">
					@csrf

				<div class="control-group">								
					<input type="text" id="inputEmail" placeholder="name" name="name">
				</div>

				@error('name')
					{{$message}}
				@enderror

				<div class="control-group">
					<input type="password" id="inputPassword" placeholder="Password" name="password">
				</div>

				@error('password')
					{{$message}}
				@enderror

				<div class="control-group">
					<label class="checkbox">
					<input type="checkbox"> Remember me
					</label>
				</div>
				<input type="submit" class="btn btn-success" value="Sign in">
				</form>		
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>
	</li>

	<li class="">

	<li>
		<a href="{{ route('supplier.loginPage') }}" role="button" style="padding-right:0"><span class="btn btn-large btn-success">Supplier Login</span></a>
	</li>

	<li>
		<a href="{{ route('supplier.index') }}" role="button" style="padding-right:0"><span class="btn btn-large btn-success">Supplier Dashboard</span></a>
	</li>

</li>

	<li>
		<a href="#register" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Register</span></a>
		<div id="register" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Register Block</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal loginFrm" action="{{ route('auth.register') }}" method="POST" enctype="multipart/form-data">
					@csrf

				<div class="control-group">								
					<input type="text" id="inputEmail" placeholder="name" name="name">
				</div>

				@error('name')
					{{$message}}
				@enderror

				<div class="control-group">								
					<input type="text" id="inputEmail" placeholder="Email" name="email">
				</div>

				@error('email')
					{{$message}}
				@enderror

				<div class="control-group">								
					<input type="text" placeholder="Country" name="country">
				</div>

				@error('country')
					{{$message}}
				@enderror

				<div class="control-group">								
					<input type="text" placeholder="Mobile" name="mobile">
				</div>

				@error('mobile')
					{{$message}}
				@enderror

				<div class="control-group">								
					<input type="text" placeholder="Address" name="address">
				</div>

				@error('address')
					{{$message}}
				@enderror

				<div class="control-group">
					<input type="password" id="inputPassword" placeholder="Password" name="password">
				</div>

				@error('password')
					{{$message}}
				@enderror

				<div class="control-group">
					<input type="file" name="picture">
				</div>

				@error('picture')
					{{$message}}
				@enderror

				<div class="control-group">
					<label class="checkbox">
					<input type="checkbox"> Remember me
					</label>
				</div>
				<input type="submit" class="btn btn-success" value="Sign up">
				</form>		
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>
	</li>

	@endauth

    </ul>
  </div>
</div>
</div>
</div>
<!-- Header End====================================================================== -->

<div id="mainBody">

<div class="container">
	<div class="row">


	@yield('content')

	</div>

</div>
	<script src="/customer/themes/js/jquery.js" type="text/javascript"></script>
	<script src="/customer/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/customer/themes/js/google-code-prettify/prettify.js"></script>
	
	<script src="/customer/themes/js/bootshop.js"></script>
    <script src="/customer/themes/js/jquery.lightbox-0.5.js"></script>
	
	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
<link rel="stylesheet" href="/customer/themes/switch/themeswitch.css" type="text/css" media="screen" />
<!-- <script src="/customer/themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
	<div id="themeContainer">
	<div id="hideme" class="themeTitle">Style Selector</div>
	<div class="themeName">Oregional Skin</div>
	<div class="images style">
	<a href="/customer/themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
	<a href="/customer/themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
	</div>
	<div class="themeName">Bootswatch Skins (11)</div>
	<div class="images style">
		<a href="/customer/themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png" alt="bootstrap business templates" ></a>
		<a href="/customer/themes/css/#" name="superhero" title="Superhero"><img src="themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>	
		<a href="/customer/themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="united"><img src="themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
		<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples and you can build your own color scheme in the backend.</small></p>
	</div>
	<div class="themeName">Background Patterns </div>
	<div class="images patterns">
		<a href="/customer/themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
		<a href="/customer/themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>
		
		<a href="/customer/themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>
		
		<a href="/customer/themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
		<a href="/customer/themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>
		 
	</div>
	</div>
</div> -->
<span id="themesBtn"></span>
</body>
</html>