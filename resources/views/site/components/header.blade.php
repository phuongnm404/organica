<div class="header-middle">
    <div class="container">
        <div class="row">
            <div class="col-md-2 clearfix">
                <div class="logo pull-left">
                    <a href="{{route('home.index')}}"><img src="/eshopper/images/home/logo.png" alt=""
                            style=" width: 100px;" /></a>
                </div>
            </div>
            @if(Auth::check())
            <div class="col-md-9">
                <ul>
                    <li> <a href=""> Xin chào {{auth()->user()->name}}</a></li>
                    <li class="drop"><a href="#"><i class="fa fa-user"></i> Tài khoản</a>
                        <ul class="drop-content">
                            <li><a href="#">Đơn hàng của tôi</a></li>
                            <li><a href="{{route('user.infor.index', ['id'=> auth()->user()->id])}}">Thông tin cá
                                    nhân</a></li>
                            <li><a href="#">Địa chỉ giao hàng</a></li>

                        </ul>
                    </li>
                    <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                    <li><a href="cart.html"><i class="fa fa-heart"></i> Sản phẩm yêu thích</a></li>
                    <li><a href="{{route('logout')}}"><i class="fa fa-lock"></i>
                            Logout</a></li>
                </ul>
            </div>
            @else
            <div class="col-md-9">
                <ul>
                    <li><a href="#" data-toggle="modal" data-target="#loginModal">Đăng nhập</a></li>
                    <li><a href="{{route('register')}}">Đăng ký</a></li>
                </ul>
            </div>
            @endif

        </div>
    </div>

</div>

@include('site.components.main_menu')
@include('site.login')