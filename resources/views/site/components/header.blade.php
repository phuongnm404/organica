<div class="header-middle">
    <!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-md-2 clearfix">
                <div class="logo pull-left">
                    <a href="index.html"><img src="eshopper/images/home/logo.png" alt="" style=" width: 100px;" /></a>
                </div>
            </div>
            <div class="col-md-10 clearfix">
                <div class="shop-menu clearfix pull-right">
                    <ul class="nav navbar-nav">
                        {{-- <li><a href=""><i class="fa fa-user"></i> Account</a></li>
                        <li><a href=""><i class="fa fa-star"></i> Wishlist</a></li> --}}
                        {{-- <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li> --}}
                        <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                        <li><a href="{{route('admin.login')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/header-middle-->

@include('site.components.main_menu')