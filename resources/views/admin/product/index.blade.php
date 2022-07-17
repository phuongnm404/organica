@extends('admin.layouts.admin')

@section('title')
<title>San pham</title>

@section('js')
<script src="{{ asset('vendors/alert/sweetalert2@11.js') }}"></script>
<script type="text/javascript" src="{{ asset('adminn\main.js') }}"></script>
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header',[
    'name' => 'Product',
    'key' => 'List'
    ])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{route('admin.product.create')}}" class="btn btn-success float-right m-2">Thêm</a>
                </div>
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Lượt xem</th>
                                <th scope="col">Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $productItem)
                            <tr>
                                <th scope="row">{{$productItem->id}}</th>

                                <td>{{$productItem->name}}</td>
                                <td>{{$productItem->price}}</td>
                                <td>
                                    <img class="product_image" src="{{$productItem->feature_image_path}}" alt="">
                                </td>
                                <td>{{optional($productItem->category)->name}}</td>
                                <td>{{$productItem->view}}</td>
                                <td>
                                    <a href="{{route('admin.product.edit', ['id' => $productItem->id])}}"
                                        class="btn btn-primary">Sửa</a>
                                    <a href=""
                                        data-url="{{ route('admin.product.delete', ['id' => $productItem->id]) }}"
                                        class="btn btn-danger action_delete">Xóa</a>

                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12" class="pull-right">
                    {{ $products->links() }}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection