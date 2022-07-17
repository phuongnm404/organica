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
                <div>
                    <strong>Tình trạng đơn hàng</strong>
                    <button class="btn">
                        <span class="badge badge-info"> {{$bill->order_status}} </span>
                    </button>
                    <br><br>
                </div>
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
                    <button class="btn">
                        <span class="badge badge-info"> {{$bill->order_status}} </span>
                    </button>
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