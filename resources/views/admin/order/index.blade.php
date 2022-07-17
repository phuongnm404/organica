@extends('admin.layouts.admin')
@section('title')
<title>ĐƠN HÀNG</title>
@section('js')
<script src="{{ asset('vendors/alert/sweetalert2@11.js') }}"></script>
<script type="text/javascript" src="{{ asset('adminn\main.js') }}"></script>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header',[
    'name' => 'Đơn hàng',
    'key' => 'List'
    ])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{route('admin.menu.create')}}" class="btn btn-success float-right m-2">Thêm</a>
                </div>
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Người nhận</th>
                                <th scope="col">Phương thức nhận hàng</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Thao tác</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bill as $value)
                            <tr>
                                <th scope="row">{{$value->id}}</th>
                                <td>{{$value->order_username}}</td>
                                <td>{{$value->method_delivery}}</td>
                                <td><span class="badge badge-info"> {{$value->order_status}}</span></td>
                                <td>{{$value->total_price}}</td>

                                <td>
                                    <a href="{{route('admin.order.edit', ['id' => $value->id] )}}"
                                        class="btn btn-primary">Sửa</a>
                                    <a href="" data-url="" class="btn btn-danger action_delete">Xóa</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12 float-right m-2">
                    {{ $bill->links() }}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection