@extends("site.layouts.master")
<!--/head-->
@section('title')
<title>Trang chủ</title>

@section('content')
@include("site.home.components.slider")

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12"><br><br></div>
            <div class="col-sm-12 padding-right">

                <!--discount item-->
                @include('site.home.components.discount')

                <!--province_items-->
                @include('site.home.components.province')

                <!--features_items-->
                @include('site.home.components.feature')




                <!--/category-tab-->
                {{-- @include('site.home.components.categorytab') --}}

                <!--recommenr_items-->
                {{-- @include("site.home.components.recommend") --}}


            </div>
        </div>
    </div>
</section>
@include('site.home.components.ad')

@section('js')
<script>
    $('#request').click(function(){
            let cart_id =  $('input#cart_id').val();
            let user_id =  $('input#user_id').val();
            $.ajax({
                url:'/admin/inbox/store',
                type:'post',
                data: jQuery.param({ 
                    user_id : user_id, 
                    cart_id: cart_id, 
                    "_token": "{{ csrf_token() }}",
                }),
                 
                //console.log(data);
                success:function(data){
                    //console.log(data)
                    toastr.success('Cảm ơn bạn đã đóng góp ý kiến!', 'Success');
                },
            });
    });
</script>
<script>
    function getIdProvince() {
        var province_id = document.querySelector('input[name="province_filter"]:checked').value;
        return province_id;
    }
    $(document).ready(function() {
        var province_id = getIdProvince();
        
        $.ajax({
                url:"{{route('home.index')}}",
                type: "GET",
                data: jQuery.param({ 
                    'province_id': province_id, 
                    "_token": "{{ csrf_token() }}",
                }), 
                success:function(data) {
                    var products = data.products;
                    var html = '';
                    $.each( products, function(index,product) {
                        html += `<div class="col-sm-2">
                            <div class = "product-image-wrapper">
                                    <div class="single-products">
                                        <form action="{{route("saveCart")}}" method="POST">
                                            @csrf
                                            <a href = "`+ `/`+ product.category.slug + `/`+ product.slug+ `/`+ product.id + `">
                                            <div class="productinfo text-center">
                                                <img src="${product.feature_image_path}" alt="" />
                                                <b>${product.name}</b>
                                                <h3>${product.price.toLocaleString()}<sup>đ</sup>/${product.weight}</h3>
                                                <input type="hidden" name="productIdHidden" class="product_id" value="${product.id}">
                                                <input type="hidden" name="quantity" id="typeNumber" class="form-control" value="1" min="1" />
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <button type="submit" class="btn btn-default add-to-cart">
                                                        <i class="fa fa-shopping-cart"></i>  </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                    </div>`;
                    });
                    $("#tbody").html(html);
                }
        });

        $("#hanoi").on('click', function() {
            var province_id = $(this).val();

            $.ajax({
                url:"{{route('home.index')}}",
                type: "GET",
                data: jQuery.param({ 
                    'province_id': province_id, 
                    "_token": "{{ csrf_token() }}",
                }), 
                success:function(data) {
                    var products = data.products;
                    var html = '';
                    $.each( products, function(index,product) {
                        html += `<div class="col-sm-2">
                            <div class = "product-image-wrapper">
                                    <div class="single-products">
                                        <form action="{{route("saveCart")}}" method="POST">
                                            @csrf
                                            <a href = "`+ `/`+ product.category.slug + `/`+ product.slug+ `/`+ product.id + `">
                                            <div class="productinfo text-center">
                                                <img src="${product.feature_image_path}" alt="" />
                                                <b>${product.name}</b>
                                                <h3>${product.price.toLocaleString()}<sup>đ</sup>/${product.weight}</h3>
                                                <input type="hidden" name="productIdHidden" class="product_id" value="${product.id}">
                                                <input type="hidden" name="quantity" id="typeNumber" class="form-control" value="1" min="1" />
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <button type="submit" class="btn btn-default add-to-cart">
                                                        <i class="fa fa-shopping-cart"></i>  </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                    </div>`;
                    });
                   
                    $("#tbody").html(html);
                }
            });
        });

        $("#tphcm").on('click', function() {
            var province_id = $(this).val();

            $.ajax({
                url:"{{route('home.index')}}",
                type: "GET",
                data: jQuery.param({ 
                    'province_id': province_id, 
                    "_token": "{{ csrf_token() }}",
                }), 
                success:function(data) {
                    var products = data.products;
                    var html = '';
                    $.each( products, function(index,product) {
                        html += `<div class="col-sm-2">
                            <div class = "product-image-wrapper">
                                    <div class="single-products">
                                        <form action="{{route("saveCart")}}" method="POST">
                                            @csrf
                                            <a href = "`+ `/`+ product.category.slug + `/`+ product.slug+ `/`+ product.id + `">
                                            <div class="productinfo text-center">
                                                <img src="${product.feature_image_path}" alt="" />
                                                <b>${product.name}</b>
                                                <h3>${product.price.toLocaleString()}<sup>đ</sup>/${product.weight}</h3>
                                                <input type="hidden" name="productIdHidden" class="product_id" value="${product.id}">
                                                <input type="hidden" name="quantity" id="typeNumber" class="form-control" value="1" min="1" />
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <button type="submit" class="btn btn-default add-to-cart">
                                                        <i class="fa fa-shopping-cart"></i>  </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                    </div>`;
                    });
                   
                    $("#tbody").html(html);
                }
            });
        })
        $("#danang").on('click', function() {
            var province_id = $(this).val();

            $.ajax({
                url:"{{route('home.index')}}",
                type: "GET",
                data: jQuery.param({ 
                    'province_id': province_id, 
                    "_token": "{{ csrf_token() }}",
                }), 
                success:function(data) {
                    var products = data.products;
                    var html = '';
                    $.each( products, function(index,product) {
                        html += `<div class="col-sm-2">
                            <div class = "product-image-wrapper">
                                    <div class="single-products">
                                        <form action="{{route("saveCart")}}" method="POST">
                                            @csrf
                                            <a href = "`+ `/`+ product.category.slug + `/`+ product.slug+ `/`+ product.id + `">
                                            <div class="productinfo text-center">
                                                <img src="${product.feature_image_path}" alt="" />
                                                <b>${product.name}</b>
                                                <h3>${product.price.toLocaleString()}<sup>đ</sup>/${product.weight}</h3>
                                                <input type="hidden" name="productIdHidden" class="product_id" value="${product.id}">
                                                <input type="hidden" name="quantity" id="typeNumber" class="form-control" value="1" min="1" />
                                            </div>
                                            <div class="product-overlay">
                                                <div class="overlay-content">
                                                    <button type="submit" class="btn btn-default add-to-cart">
                                                        <i class="fa fa-shopping-cart"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                    </div>`;
                    });
                    
                    $("#tbody").html(html);
                }
            });
        })
    });
</script>

@endsection
@endsection