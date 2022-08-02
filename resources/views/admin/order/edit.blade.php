@extends('admin.layouts.admin')
@section('title')
<title>Chi tiết hóa đơn</title>
@section('content')
<div class="content-wrapper" style="height:auto;">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header', [
    'name' => 'Order',
    'key'=> 'Edit'
    ])
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid row">
            <div class="col-md-12">
                <div class="invoice-title">
                    <h3>Hóa đơn số {{$bill->id}}</h3>
                </div>
                <hr>
            </div>

            <div class="col-md-12">

                <div class="row">
                    <div class="col-md-2"><strong>Tình trạng đơn hàng</strong></div>
                    @if($bill->order_status==2)
                    <div class="row">
                        <div class="status col-md-6">
                            <select class=" form-control" name="status" id="" disabled>
                                <option value="">Giao hàng thành công</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-warning" disabled>
                                <span style="color: black; text-decoration: none;" disabled>Lưu</span>
                            </button>
                        </div>
                    </div>

                    @else

                    <form action="{{route('admin.order.updateStatus', ['id' => $bill->id])}}" method="POST"
                        class="col-md-10">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 status ">
                                <select class="form-control" name="order_status" id="">
                                    <option value="0">Đang chờ xác nhận</option>
                                    <option value="1">Đang giao hàng</option>
                                    <option value="2">Giao hàng thành công</option>
                                    <option value="3">Hủy đơn</option>
                                    <option value="4">Giao hàng thất bại</option>
                                    <option value="5">Đang chờ xử lý hủy</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-warning" type="submit">
                                    <a style="color: black; text-decoration: none;">Lưu</a>
                                </button>
                            </div>
                        </div>

                    </form>



                    @endif
                </div><br>

            </div>
            <div class="col-md-6">
                <div>
                    <strong>Người nhận:</strong><br>
                    <div>
                        <span> {{$bill->order_username}}</span> <br>
                        <span> {{$bill->order_phone}}</span><br>
                        <span>{{$bill->order_address}}</span><br>
                    </div>

                </div>
            </div>
            <div class="col-md-6 ">
                <strong>Ngày đặt hàng</strong><br>
                <div>
                    <span> {{$bill->created_at}}</span> <br>
                </div>
                <strong>Phương thức nhận hàng</strong><br>
                <div>
                    <span> {{$bill->method_delivery}}</span> <br> <br>
                </div>
            </div>
            <div class="col-md-12">
                <strong>Ghi chú đơn hàng</strong><br>
                <span> {{$bill->order_note}}</span>
                <br><br>
            </div>

            <div class="col-md-12">
                <address>
                    <strong>Tình trạng đơn hàng</strong>
                    @if($bill->order_status==0)
                    <span class="badge badge-secondary"> Đang chờ xác nhận</span>
                    @elseif($bill->order_status==1)
                    <span class="badge badge-warning"> Đang giao hàng</span>
                    @elseif($bill->order_status==2)
                    <span class="badge badge-success"> Giao hàng thành công</span>
                    @else
                    <span class="badge badge-danger"> Hủy đơn</span>
                    @endif
                    <br><br>
                </address>

            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Danh sách sản phẩm</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Tên sản phẩm</strong></td>
                                    <td class="text-center"><strong>Giá</strong></td>
                                    <td class="text-center"><strong>Số lượng</strong></td>
                                    <td class="text-right"><strong>Giá tiền</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetailList as $productDetailItem)
                                <tr>
                                    <td><img src="{{ URL::to($productDetailItem->img)}}" alt="" style="width: 50px;">
                                    </td>
                                    <td class="text-center">{{$productDetailItem->name}}</td>

                                    <td class="text-center">{{number_format($productDetailItem->price)}}</td>
                                    <td class="text-center">{{$productDetailItem->quantity}}</td>
                                    <td class="text-right">
                                        {{number_format($productDetailItem->quantity*$productDetailItem->price)}}
                                    </td>
                                </tr>
                                @endforeach


                                <tr>
                                    <td class="no-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Tổng tiền</strong></td>
                                    <td class="no-line text-right"><b>{{$bill->total_price}}</b> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="return col-md-12">
                    <p class="pull-right"><a href="{{route('order.index')}}"><button class="btn btn-primary">Quay
                                lại</button>
                        </a></p>
                    <p class="pull-left"><a href="{{route('order.index')}}"><button class="btn btn-danger">Yêu cầu hủy
                                đơn
                                hàng</button>
                        </a></p>
                </div>
            </div> --}}
        </div>
    </div>

</div>
@endsection