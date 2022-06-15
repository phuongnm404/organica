@extends('admin.layouts.admin')

@section('title')
<title>Sua san pham</title>

@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
@endsection


@section('js')
<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('adminn/product/add/add.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace('ckeditor2');
</script>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header', [
    'name' => 'Product',
    'key'=> 'Edit'
    ]);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="product-name">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" id="product-name"
                                value="{{$product->name}}" placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="product-price">Giá</label>
                            <input type="text" name="price" class="form-control" id="product-price"
                                value="{{$product->price}}" placeholder="Nhập giá tiền">
                        </div>
                        <div class="form-group">
                            <label for="product-price">Thương hiệu</label>
                            <select name="brand_id" class="form-control  select2_init_brand">

                                @foreach ($brand as $brandItem)
                                <option value="{{$brandItem->id}}" selected>{{$brandItem->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product-name">Hình ảnh chủ đề</label>
                            <input class='form-control-file' type="file" name="feature_image_path"
                                id="product-feature-image">
                            <div class=" col-lg-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{$product->feature_image_path }}" alt=""
                                            class="image_feature_product">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group container-image-detail">
                            <label for="product-name">Hình ảnh chi tiết</label>
                            <input class='form-control-file' type="file" name="image_path[]" id="product-detail-image"
                                multiple>
                            <div class="col-md-12">
                                <div class="row">

                                    @foreach($product->productImages as $productImageItem)
                                    <div class="col-md-3">
                                        <img class="image_detail_product" src="{{ $productImageItem->image_path }}"
                                            alt="">
                                    </div>
                                    @endforeach


                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Chọn danh mục </label>
                            <select class="form-control select2_init" name="category_id">
                                <option value="0">-Chọn danh mục-</option>
                                {!!$htmlOption!!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product-price">Trọng lượng</label>
                            <input type="text" name="weight" class="form-control" id="product-weight"
                                value="{{$product->weight}}" placeholder="Nhập trọng lượng">
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">

                                @if(isset($list_tag))
                                @foreach ($list_tag as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach

                                @else

                                @foreach ($product->tags as $tagItem)
                                <option value="{{$tagItem->id}}" selected>{{$tagItem->name}}</option>
                                @endforeach

                                @endif

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="product-price">Mô tả</label>
                            <textarea type="text" name="contents" class="form-control" id="ckeditor2"
                                placeholder="Nhập mô tả sản phẩm" rows=5>{{ $product->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Sửa thông tin</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->

@endsection