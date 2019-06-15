<ul class="nav navbar-nav collapse navbar-collapse">
    <li><a href="{{ url('/') }}" class="active">Home</a></li>
    <li class="dropdown"><a href="{{ route('shop') }}">Shop<i class="fa fa-angle-down"></i></a>
        <ul role="menu" class="sub-menu">
            <li><a href="{{ route('shop') }}">Products</a></li>
            <li><a href="product-details.html">Product Details</a></li>
            <li><a href="checkout.html">Checkout</a></li>
            <li><a href="cart.html">Cart</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
    </li>
    <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
        <ul role="menu" class="sub-menu">
            <li><a href="blog.html">Blog List</a></li>
            <li><a href="blog-single.html">Blog Single</a></li>
        </ul>
    </li>
    <li><a href="404.html">404</a></li>
    <li><a href="{{ route('contact') }}">Contact</a></li>
</ul>