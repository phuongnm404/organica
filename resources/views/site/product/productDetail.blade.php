@extends("site.layouts.master")

<!--/head-->
@section('css')
@endsection

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="product-details col-sm-12">
                    <!--product-details-->
                    <div class="col-sm-6">
                        <div class="view-product">
                            <img src="{{$products->feature_image_path}}" alt="" />

                        </div>
                        <div id="similar-product">
                            <!-- Wrapper for slides -->
                            <div class="img-product-detail">
                                @foreach($products->productImages as $key => $productImageItem)
                                <div class="item">
                                    <a href=""><img src="{{ $productImageItem->image_path }}" alt="" /></a>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class=" row product-information">
                            <!--/product-information-->
                            <h1>
                                {{$products->name}}
                            </h1>
                            <div class="product-detail col-sm-12">
                                <h3>{{number_format($products->price)}}<sup>đ</sup> &ensp;/&ensp;{{$products->weight}}
                                </h3>
                            </div>
                            <div class="product-number col-sm-12">
                                <p class="form-label col-sm-6" for="typeNumber">SỐ LƯỢNG</p>
                                <div class="num col-sm-6">
                                    <input type="number" id="typeNumber" class="form-control" value="1" min="1" />
                                </div>

                            </div>
                            <a href="">
                                <button type="button" class="btn btn-fefault cart">
                                    <i class="fa fa-shopping-cart"></i> &ensp;Thêm vào giỏ hàng
                                </button>
                            </a>
                        </div>
                        <!--/product-information-->
                    </div>
                </div>
                <!--/product-details-->

                <div class="product-information col-sm-7">

                    <table>
                        <tbody>
                            <tr>
                                <th class="col-sm-3 ">
                                    <p class="text-uppercase">Mô tả</p>
                                </th>
                                <td>
                                    <p class="text-justify"> {!!$products->description !!}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">
                                    <p class="text-uppercase">Thương hiệu</p>
                                </th>
                                <td>
                                    <p class="text-justify"> {{$productBrand->getBrandById($products->brand_id) }}</p>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-sm-3">
                                    <p class="text-uppercase">Đặc tính</p>
                                </th>
                                <td>

                                    @foreach($products->tags as $productTagItem)
                                    <div class="feature-tag">
                                        <a href=""> <span>{{ $productTagItem->name }}</span></a>
                                    </div>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
                <div class="product-recipe-recommend col-sm-5">

                </div>


            </div>
        </div>
    </div>
</section>

@endsection