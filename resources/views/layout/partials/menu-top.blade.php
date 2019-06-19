<ul class="nav navbar-nav">
    <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
    <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
    <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
    <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i> Cart</a> {{ Cart::count() }}</li>
    @if (Auth::check())
        <li nav-item><a href="{{url('/')}}/profile"><i class="fa fa-user"></i> {{ Auth::user()->name}}</li>
        <li class="dropdown-item"><a href="{{url('/logout')}}"><i class="fa fa-lock"></i> Logout</a></li>
    @else
        <li><a href="{{ route('login') }}"><i class="fa fa-lock"></i> Login</a></li>
    @endif
</ul>