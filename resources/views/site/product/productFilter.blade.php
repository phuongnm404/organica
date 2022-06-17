@extends("site.layouts.product_master")
<!--/head-->
@yield('css')
@section('content')
<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9  padding-right">
                aaaa

                {{-- <div class="brands_items">
                    @foreach ($productBrand as $productBrandItem)
                    <div></div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">

                                    <a href="">
                                        <img src="{{$productBrandItem->feature_image_path}}" alt="" />
                                        <b>{{$productBrandItem->name}}</b>
                                        <h3>{{number_format($productBrandItem->price)}}<sup>đ</sup>/{{$productBrandItem->weight}}
                                        </h3>
                                    </a>

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

                </div> --}}

            </div>
        </div>
    </div>
</section>


@endsection