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
                <div class="col-lg-3 mb-2">
                    <select class="form-control" name="order_status" id="">
                        <option value="0">Đang chờ xác nhận</option>
                        <option value="1">Đang giao hàng</option>
                        <option value="2">Giao hàng thành công</option>
                        <option value="3">Hủy đơn</option>
                        <option value="4">Giao hàng thất bại</option>
                        <option value="5">Đang chờ xử lý hủy</option>
                    </select>
                </div>
                <div class="col-lg-1 mb-2">
                    <button type="submit" class="btn btn-outline-primary form-control"> <i class="fa fa-search"></i>
                    </button>
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
                            @foreach ($bill_fill as $value)
                            <tr>
                                <th scope="row">{{$value->id}}</th>
                                <td>{{$value->order_username}}</td>
                                <td>{{$value->method_delivery}}</td>
                                @if($value->order_status==0)
                                <td><span class="badge badge-secondary"> Đang chờ xác nhận</span></td>
                                @elseif($value->order_status==1)
                                <td><span class="badge badge-warning"> Đang giao hàng</span></td>
                                @elseif($value->order_status==2)
                                <td><span class="badge badge-success"> Giao hàng thành công</span></td>
                                @else
                                <td><span class="badge badge-danger"> Hủy đơn</span></td>
                                @endif
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
                    {{ $bill_fill->links() }}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection