@extends('admin.layouts.admin')

@section('title')
<title>Them san pham</title>

@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />

@endsection


@section('js')
<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('adminn/product/add/add.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace('ckeditor1');
</script>
@endsection



@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header', [
    'name' => 'Product',
    'key'=> 'Add'
    ]);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="col-lg-12">

            </div>
            <form action="{{ route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="product-name">Tên sản phẩm</label>

                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" id="product-name" placeholder="Nhập tên sản phẩm">

                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product-price">Giá</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price') }}" id="product-price" placeholder="Nhập giá tiền">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product-price">Thương hiệu</label>
                            {{-- <input type="text" name="brand"
                                class="form-control @error('brand') is-invalid @enderror" value="{{ old('brand') }}"
                                id="product-brand" placeholder="Nhập tên thương hiệu"> --}}
                            <select name="brand_id"
                                class="form-control select2_init_brand @error('brand_id') is-invalid @enderror">
                                <option value="">-Chọn thương hiệu-</option>

                                @if(isset($list_brand))
                                @foreach ($list_brand as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                                @endif

                            </select>
                            @error('brand_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product-name">Hình ảnh chủ đề</label>
                            <input class='form-control-file' type="file" name="feature_image_path"
                                id="product-feature-image">
                        </div>
                        <div class="form-group">
                            <label for="product-name">Hình ảnh chi tiết</label>
                            <input class='form-control-file' type="file" name="image_path[]" id="product-detail-image"
                                multiple>
                        </div>



                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Chọn danh mục </label>
                            <select class="form-control select2_init" name="category_id">
                                <option value="">-Chọn danh mục-</option>
                                {!!$htmlOption!!}
                            </select>

                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product-price">Trọng lượng</label>
                            <input type="text" name="weight" class="form-control @error('weight') is-invalid @enderror"
                                value="{{ old('weight') }}" id="product-weight" placeholder="Nhập trọng lượng">
                            @error('weight')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tags</label>
                            <select name="tags[]"
                                class="form-control tags_select_choose @error('tags') is-invalid @enderror"
                                multiple="multiple">

                                @if(isset($list_tag))
                                @foreach ($list_tag as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                                @endif

                            </select>
                            @error('tags')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="product-price">Mô tả</label>
                            <textarea type="text" name="contents"
                                class="form-control @error('contents') is-invalid @enderror" id="ckeditor1"
                                placeholder="Nhập mô tả sản phẩm" rows=5>
                                {{ old('contents') }}
                            </textarea>
                            @error('contents')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Thêm</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection