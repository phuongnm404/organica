@extends("site.layouts.product_master")
<!--/head-->
@yield('css')
@section('content')
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">TẤT CẢ SẢN PHẨM</h2>
    @foreach ($productAll as $productAllItem)
    <div class="col-sm-3">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{$productAllItem->feature_image_path}}" alt="" />
                    <b>{{$productAllItem->name}}</b>
                    <h3>{{number_format($productAllItem->price)}}<sup>đ</sup>/{{$productAllItem->weight}}</h3>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <b>{{$productAllItem->name}}</b><br>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ
                            hàng</a>
                    </div>
                </div>
            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-heart"></i>Yêu thích</a></li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach

    <div class="col-sm-12">
        <ul class="pagination">


            <li class="active"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">&raquo;</a></li>
        </ul>
    </div>

</div>
@endsection