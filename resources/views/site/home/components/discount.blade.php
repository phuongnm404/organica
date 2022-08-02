<div class="row">
    <div class="features_items col-sm-12" id="spkhuyenmai">
        <!--features_items-->
        <h2 class="title text-center">SẢN PHẨM KHUYẾN MÃI</h2>
        @foreach ($productDiscount as $product)
        <div class="col-sm-2">
            <div class="product-image-wrapper">
                <div class="single-products">
                    {{-- <form action="{{route('saveCart')}}" method="POST">
                        @csrf --}}
                        <div class="product_discount">
                            <div class="productinfo text-center">
                                <a href="  {{ route('productDetail', ['slugCategory' =>$product->category->slug, 'slugProduct' =>$product->slug, 'productId'=>$product->id]  )}}"
                                    id="seeDetail">
                                    <img src="{{$product->feature_image_path}}" alt="" />
                                    <b>{{$product->name}}</b>

                                    <h3>{{number_format( $product->sale_price)}}<sup>đ</sup>&ensp;<strike>
                                            {{number_format($product->price)}}<sup>đ</sup>
                                        </strike>
                                    </h3>
                                    <span class="promotion">
                                        {{(1-($product->sale_price/$product->price))*100}}%
                                    </span>

                                    <input type="hidden" name="productIdHidden" class="product_id"
                                        value="{{$product->id}}">
                                    <input type="hidden" name="quantity" id="typeNumber" class="form-control" value="1"
                                        min="1" />
                                </a>

                            </div>
                        </div>

                        <div class="product-overlay">
                            <div class="overlay-content">
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"
                                        id="addCart"></i></button>
                            </div>
                        </div>
                        {{--
                    </form> --}}
                </div>

                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-heart"></i>Yêu thích</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="col-sm-12 text-center view-more">
        <p><a href="{{route('productAllDiscount')}}">Xem
                thêm sản phẩm <i class="fa fa-angle-double-right">
                </i> </a></p>
    </div>
</div>