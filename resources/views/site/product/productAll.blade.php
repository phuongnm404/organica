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
                    @csrf
                    <div class="productinfo text-center">
                        <a
                            href="{{ route('productDetail', ['slugCategory' => $categoryModel->getCategoryIdSlug($productAllItem->category_id), 'slugProduct' => $productAllItem->slug, 'productId'=>$productAllItem->id]  )}}">
                            <img src="{{$productAllItem->feature_image_path}}" alt="" />
                            <b>{{$productAllItem->name}}</b>


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
        {{ $productAll->links() }}
    </div>

</div>

@endsection