@extends('site.layouts.master')
@section('title')
<title>Danh sách hóa đơn của bạn</title>
@section('css')
<style>
    .cell-1 {
        border-collapse: separate;
        border-spacing: 0 4em;
        background: #fff;
        border-bottom: 5px solid transparent;
        /*background-color: gold;*/
        background-clip: padding-box;
    }

    thead {
        background: #dddcdc;
    }
</style>

@section('content')
<div class="container mt-5 form-information">
    <div class="d-flex justify-content-center row">
        <div class="col-md-12">
            <div class="rounded">
                <div class="table-responsive table-borderless">
                    <table class="table">
                        <thead>
                            <tr class="text-center">

                                <th>Mã hóa đơn</th>
                                <th>Tên người nhận</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Tổng tiền</th>
                                <th>Phương thức nhận hàng</th>
                                <th colspan="2">Ngày đặt hàng</th>

                            </tr>
                        </thead>
                        <tbody class="table-body">
                            @foreach ($bill as $value )
                            <tr class="cell-1">
                                <td>{{$value->id}}</td>
                                <td>{{$value->order_username}}</td>

                                @if($value->order_status==0)
                                <td><span class="label label-default"> Đang chờ xác nhận</span></td>
                                @elseif($value->order_status==1)
                                <td><span class="label label-warning"> Đang giao hàng</span></td>
                                @elseif($value->order_status==2)
                                <td><span class="label label-success"> Giao hàng thành công</span></td>
                                @else
                                <td><span class="label label-danger"> Hủy đơn</span></td>
                                @endif

                                <td>{{$value->total_price}}</td>
                                <td>{{$value->method_delivery}}</td>
                                <td>{{$value->created_at}}</td>
                                <td><a href="{{route('order.detail', ['id' => $value->id])}}"><i
                                            class="fa fa-eye text-black-50"></i></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection