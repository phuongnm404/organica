<div class="header-middle">
    <!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-md-2 clearfix">
                <div class="logo pull-left">
                    <a href="index.html"><img src="eshopper/images/home/logo.png" alt="" style=" width: 100px;" /></a>
                </div>
            </div>
            @if(Auth::check())
            <div class="col-md-10 clearfix">
                <div class="shop-menu clearfix pull-right">
                    <ul class="nav navbar-nav">


                        <li>
                            Xin chào {{auth()->user()->name}}
                        </li>
                        <li><a href="cart.html"><i class="fa fa-user"></i>Tài khoản</a></li>
                        <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                        <li><a href="cart.html"><i class="fa fa-heart"></i> Sản phẩm yêu thích</a></li>
                        <li><a href="{{route('logout')}}"><i class="fa fa-lock"></i>
                                Logout</a></li>

                    </ul>
                </div>
            </div>

            @else
            <div class="col-md-10 clearfix">
                <div class="shop-menu clearfix pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-lock"></i>
                                Đăng
                                nhập</a></li>
                        <li><a href="{{route('register')}}"><i class="fa fa-lock"></i>
                                Đăng
                                ký</a></li>

                    </ul>
                </div>
            </div>




            @endif
        </div>
    </div>
</div>
<!--/header-middle-->

@include('site.components.main_menu')
@include('site.login')