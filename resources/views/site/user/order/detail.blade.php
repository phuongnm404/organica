@extends('site.layouts.master')
@section('title')
<title>Chi tiết hóa đơn</title>
@section('content')
<div class="container">
    <div class="row">
        <div class="invoice-title">
            <h3>Hóa đơn số {{$billDetail->id}}</h3>
        </div>
        <hr>
        <div class="col-md-4">
            <div>
                <address>
                    <strong>Người đặt:</strong><br>
                    {{$user->name}}<br>
                    {{$user->phone}}<br>
                </address>
            </div>
            <div>
                <address>
                    <strong>Người nhận:</strong><br>
                    {{$billDetail->order_username}}<br>
                    {{$billDetail->order_phone}}<br>
                    {{$billDetail->order_address}}<br>
                </address>
            </div>

            <div>
                <address>
                    <strong>Ngày đặt hàng</strong><br>
                    {{$billDetail->created_at}}<br><br>
                </address>
            </div>
            <div>
                <address>
                    <strong>Phương thức nhận hàng</strong><br>
                    {{$billDetail->method_delivery}}<br><br>
                </address>
            </div>
            <div>
                <address>
                    <strong>Ghi chú đơn hàng</strong><br>
                    {{$billDetail->order_note}}<br>

                </address>
            </div>
        </div>

        <div class="col-md-8">
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

                                {{--
                                <tr>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right">$670.99</td>
                                </tr> --}}
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Tổng tiền</strong></td>
                                    <td class="no-line text-right"><b>{{$billDetail->total_price}}</b> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="return col-md-12">
                    <p class="pull-right"><a href="{{route('order.index')}}"><button class="btn btn-primary">Quay
                                lại</button>
                        </a></p>
                    <p class="pull-left"><a href="{{route('order.index')}}"><button class="btn btn-danger">Yêu cầu hủy
                                đơn
                                hàng</button>
                        </a></p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection