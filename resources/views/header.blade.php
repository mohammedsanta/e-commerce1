<header>

    @auth

        @if(Auth::guard()->name == 'web')
        
        <a href="{{ route('index') }}">Products</a>
        <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <input type="submit" value="Logout">
        </form>
        <a href="{{ route('cart') }}">Cart</a>

        @else

        <!-- Supplier -->
        <a href="{{ route('supplier.index') }}">Products</a>
        <a href="{{ route('supplier.product.create') }}">Create Product</a>
        <a href="{{ route('supplier.profile') }}">Profile</a>
        <a href="{{ route('supplier.myproducts') }}">My Products</a>
        <form action="{{ route('supplier.logout') }}" method="POST">
            @csrf
            <input type="submit" value="Suppplier Logout">
        </form>

        @endif
    
    @else
    
    <a href="/">Home</a>
    <a href="{{ route('index') }}">Products</a>
    <a href="{{ route('auth.loginPage') }}">Login</a>
    <a href="{{ route('auth.register') }}">Register</a>
    <a href="{{ route('supplier.loginPage') }}">Login Supplier</a>
    <a href="{{ route('supplier.profile') }}">Supplier Profile</a>

    @endauth

</header>