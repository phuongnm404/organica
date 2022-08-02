@extends("site.layouts.product_master")
<!--/head-->
@section('title')
<title>Sản phẩm khuyến mại</title>


@section('content')
@include("site.components.breadcrumb",[
'name' => 'Sản phẩm',
'key' => 'Sản phẩm khuyến mại'
])
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">SẢN PHẨM KHUYẾN MẠI</h2>

    @foreach ($productAllDiscount as $productAllDiscountItem)
    <div class="col-sm-3">
        <div class="product-image-wrapper">
            <div class="single-products">
                <form action="{{route('saveCart')}}" method="POST">
                    @csrf
                    <div class="productinfo text-center">
                        <a
                            href="{{ route('productDetail', ['slugCategory' => $categoryModel->getCategoryIdSlug($productAllDiscountItem->category_id), 'slugProduct' => $productAllDiscountItem->slug, 'productId'=>$productAllDiscountItem->id]  )}}">
                            <img src="{{$productAllDiscountItem->feature_image_path}}" alt="" />
                            <b>{{$productAllDiscountItem->name}}</b>


                            <h3>{{$productAllDiscountItem->sale_price}}<sup>đ</sup>/{{$productAllDiscountItem->weight}}
                            </h3>

                            <span class="promotion">
                                {{(1-($productAllDiscountItem->sale_price/$productAllDiscountItem->price))*100}}%
                            </span>

                            <input type="hidden" name="productIdHidden" class="product_id"
                                value="{{$productAllDiscountItem->id}}">
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
                            {{-- <a href="{{route('saveCart')}}">thêm</a> --}}
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

    <div class="col-sm-12 pull-right">
        {{-- {{ $productAllDiscount->links() }} --}}
    </div>

</div>

@endsection