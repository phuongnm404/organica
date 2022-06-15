<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">SẢN PHẨM NỔI BẬT</h2>
    @foreach ($products as $product)
    <div class="col-sm-3">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="{{$product->feature_image_path}}" alt="" />
                    <b>{{$product->name}}</b>
                    <h3>{{number_format($product->price)}}<sup>đ</sup>/{{$product->weight}}</h3>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <b>{{$product->name}}</b><br>
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

            {{ $products->links() }}
            <li class="active"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">&raquo;</a></li>
        </ul>
    </div>

</div>