@extends('site.layouts.master')

@section('title')
<title>User Profile</title>

@section('content')
<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#menu0">Thông tin cá nhân</a></li>
        <li><a data-toggle="tab" href="#menu1">Thay đổi mật khẩu</a></li>
        <li><a data-toggle="tab" href="#menu2">Địa chỉ giao nhận</a></li>
    </ul>

    <div class="tab-content">
        <div id="menu0" class="tab-pane fade in active">
            @include('site.user.infor.updateInformation')
        </div>
        <div id="menu1" class="tab-pane fade">
            @include('site.user.infor.updatePassword')
        </div>
        <div id="menu2" class="tab-pane fade">
            @include('site.user.infor.insertAddress')
        </div>
    </div>

</div>


@endsection