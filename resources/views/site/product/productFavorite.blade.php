@extends("site.layouts.product_master")
<!--/head-->
@section('title')
<title>Sản phẩm yêu thích</title>

@section('content')
<div class="content-header">
    <div class="container">
        <div class="row mb-2">
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('productAll')}}">Sản phẩm</a></li>
                    <li class="breadcrumb-item">Sản phẩm yêu thích</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<div class="features_items">
    <!--features_items-->
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center">Sản phẩm yêu thích</h2>
        @if (isset($products) && count($products) > 0)
        @foreach ($products as $productItem)

        <div class="col-sm-3">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <form action="{{route('saveCart')}}" method="POST">
                        @csrf
                        <div class="productinfo text-center">
                            <a
                                href="{{ route('productDetail', ['slugCategory' => $category_slug->slug, 'slugProduct' => $productModel-> getProductType($productItem->slug) ->slug, 'productId'=>$productItem->id]  )}}">
                                <img src="{{$productItem->feature_image_path}}" alt="" />
                                <b>{{$productItem->name}}</b>
                                @if($productItem->sale_price !=0)
                                <h3>{{number_format($productItem->sale_price)}}<sup>đ</sup>
                                    <strike>
                                        {{number_format($productItem->price)}}
                                    </strike>
                                </h3>

                                <span class="promotion">
                                    {{($productItem->sale_price/$productItem->price)*100}}%
                                </span>
                                @else
                                <h3>{{number_format($productItem->price)}}<sup>đ</sup>/{{$productItem->weight}}
                                </h3>
                                @endif



                                <input type="hidden" name="productIdHidden" class="product_id"
                                    value="{{$productItem->id}}">
                                <input type="hidden" name="quantity" id="typeNumber" class="form-control" value="1"
                                    min="1" />
                            </a>

                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <button type="submit" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i></button>
                                <button type="button" class="btn btn-default add-to-favorite"><i
                                        class="fa fa-shopping-cart"></i></button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>

        @endforeach
        <div class="col-sm-12 pull-right">
            {{$products->links()}}
        </div>
        @else
        <div class="col-sm-12">
            <div class="box-notice text-center">
                <p>Xin lỗi quý khách, danh mục này hiện chưa có sản phẩm.</p>
            </div>
        </div>
        @endif


    </div>
    @endsection