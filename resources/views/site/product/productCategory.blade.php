@extends("site.layouts.product_master")
<!--/head-->
@yield('css')
@section('content')
<div class="features_items">
    <!--features_items-->
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">{{$category_slug->name}}</h2>

        @foreach ($products as $productItem)
        <div></div>
        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{$productItem->feature_image_path}}" alt="" />
                        <b>{{$productItem->name}}</b>
                        <h3>{{number_format($productItem->price)}}<sup>đ</sup>/{{$productItem->weight}}</h3>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <b>{{$productItem->name}}</b><br>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào
                                giỏ
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