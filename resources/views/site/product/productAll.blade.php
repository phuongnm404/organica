@extends("site.layouts.product_master")
<!--/head-->
@yield('css')

@section('content')
@include("site.components.breadcrumb",[
'name' => 'Sản phẩm',
'key' => 'Tất cả sản phẩm'
])
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">TẤT CẢ SẢN PHẨM</h2>

    @foreach ($productAll as $productAllItem)
    <div class="col-sm-3">
        <div class="product-image-wrapper">
            <div class="single-products">
                <form action="{{route('saveCart')}}" method="POST">
                    <div class="productinfo text-center">
                        <a
                            href="{{ route('productDetail', ['slugCategory' => $categoryModel->getCategoryIdSlug($productAllItem->category_id), 'slugProduct' => $productAllItem->slug, 'productId'=>$productAllItem->id]  )}}">
                            <img src="{{$productAllItem->feature_image_path}}" alt="" />
                            <b>{{$productAllItem->name}}</b>
                            {{-- {{ $productGetSlugCategory-> getCategoryType($productAllItem->category_id->slug)
                            ->slug}}
                            --}}
                            <h3>{{number_format($productAllItem->price)}}<sup>đ</sup>/{{$productAllItem->weight}}</h3>

                            <input type="hidden" name="productIdHidden" class="product_id"
                                value="{{$productAllItem->id}}">
                            <input type="hidden" name="quantity" id="typeNumber" class="form-control" value="1"
                                min="1" />
                        </a>

                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <button type="submit" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Thêm
                                vào
                                giỏ
                                hàng</button>
                        </div>
                    </div>
                </form>
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