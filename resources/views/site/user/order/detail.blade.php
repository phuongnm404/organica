@extends('site.layouts.master')
@section('title')
<title>Chi tiết hóa đơn</title>
@section('css')
<style>
    #progressbar-1 {
        color: #455A64;
    }

    #progressbar-1 li {
        list-style-type: none;
        font-size: 13px;
        width: 33.33%;
        float: left;
        position: relative;
    }

    #progressbar-1 #step1:before {
        content: "1";
        color: #fff;
        width: 29px;
        margin-left: 22px;
        padding-left: 11px;
    }

    #progressbar-1 #step2:before {
        content: "2";
        color: #fff;
        width: 29px;
    }

    #progressbar-1 #step3:before {
        content: "3";
        color: #fff;
        width: 29px;
        margin-right: 22px;
        text-align: center;
    }

    #progressbar-1 li:before {
        line-height: 29px;
        display: block;
        font-size: 12px;
        background: #455A64;
        border-radius: 50%;
        margin: auto;
    }

    #progressbar-1 li:after {
        content: '';
        width: 121%;
        height: 2px;
        background: #455A64;
        position: absolute;
        left: 0%;
        right: 0%;
        top: 15px;
        z-index: -1;
    }

    #progressbar-1 li:nth-child(2):after {
        left: 50%
    }

    #progressbar-1 li:nth-child(1):after {
        left: 25%;
        width: 121%
    }

    #progressbar-1 li:nth-child(3):after {
        left: 25%;
        width: 50%;
    }

    #progressbar-1 li.active:before,
    #progressbar-1 li.active:after {
        background: #1266f1;
    }

    .card-stepper {
        z-index: 0
    }
</style>
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
        <div class="status_order col-md-8" style="margin-bottom: 20px;">
            <ul id="progressbar-1" class="mx-0 mt-0 mb-5 px-0 pt-0 pb-4">
                <li class="step0 active" id="step1"><span style="margin-left: 22px; margin-top: 12px;">Đang chờ xác
                        nhận</span>
                </li>
                <li class="step0 text-center" id="step2"><span>Đang giao hàng</span></li>
                <li class="step0 text-muted text-right" id="step3"><span style="margin-right: 5px;">Đã nhận hàng</span>
                </li>
            </ul>
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