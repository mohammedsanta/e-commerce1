	<!-- Sidebar ================================================== -->
    <div id="sidebar" class="span3">

			@Auth
				<div class="well well-small">
					<a id="myCart" href="{{ route('cart') }}">
						<img src="/customer/themes/images/ico-cart.png" alt="cart">
						Items in your cart  
						<!-- <span class="badge badge-warning pull-right">$155.00</span> -->
					</a>
				</div>
			@else

			@endauth

			<ul id="sideManu" class="nav nav-tabs nav-stacked">
				<li class="subMenu open"><a> ELECTRONICS</a>
					<ul>
					<li><a class="active" href="{{ route('products.serach','camera') }}"><i class="icon-chevron-right"></i>Cameras</a></li>
					<li><a href="{{ route('products.serach','computer') }}"><i class="icon-chevron-right"></i>Computers</a></li>
					<li><a href="{{ route('products.serach','mobile') }}"><i class="icon-chevron-right"></i>Mobile Phone</a></li>
					<li><a href="{{ route('products.serach','smartwatch') }}"><i class="icon-chevron-right"></i>Smart Watch</a></li>
					</ul>
				</li>
				<!-- <li class="subMenu"><a> CLOTHES [840] </a>
				<ul style="display:none">
					<li><a href="products.html"><i class="icon-chevron-right"></i>Women's Clothing (45)</a></li>
					<li><a href="products.html"><i class="icon-chevron-right"></i>Women's Shoes (8)</a></li>												
					<li><a href="products.html"><i class="icon-chevron-right"></i>Women's Hand Bags (5)</a></li>	
					<li><a href="products.html"><i class="icon-chevron-right"></i>Men's Clothings  (45)</a></li>
					<li><a href="products.html"><i class="icon-chevron-right"></i>Men's Shoes (6)</a></li>												
					<li><a href="products.html"><i class="icon-chevron-right"></i>Kids Clothing (5)</a></li>												
					<li><a href="products.html"><i class="icon-chevron-right"></i>Kids Shoes (3)</a></li>												
				</ul>
				</li>
				<li class="subMenu"><a>FOOD AND BEVERAGES [1000]</a>
					<ul style="display:none">
					<li><a href="products.html"><i class="icon-chevron-right"></i>Angoves  (35)</a></li>
					<li><a href="products.html"><i class="icon-chevron-right"></i>Bouchard Aine & Fils (8)</a></li>												
					<li><a href="products.html"><i class="icon-chevron-right"></i>French Rabbit (5)</a></li>	
					<li><a href="products.html"><i class="icon-chevron-right"></i>Louis Bernard  (45)</a></li>
					<li><a href="products.html"><i class="icon-chevron-right"></i>BIB Wine (Bag in Box) (8)</a></li>												
					<li><a href="products.html"><i class="icon-chevron-right"></i>Other Liquors & Wine (5)</a></li>												
					<li><a href="products.html"><i class="icon-chevron-right"></i>Garden (3)</a></li>												
					<li><a href="products.html"><i class="icon-chevron-right"></i>Khao Shong (11)</a></li>												
				</ul>
				</li>
				<li><a href="products.html">HEALTH & BEAUTY [18]</a></li>
				<li><a href="products.html">SPORTS & LEISURE [58]</a></li>
				<li><a href="products.html">BOOKS & ENTERTAINMENTS [14]</a></li> -->
			</ul>
			<br/>

		</div>
<!-- Sidebar end=============================================== -->