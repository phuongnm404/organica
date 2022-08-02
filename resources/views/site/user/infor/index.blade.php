@extends('site.layouts.master')

@section('title')
<title>Thông tin cá nhân</title>

@section('content')
<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#menu0">Thông tin cá nhân</a></li>
        <li><a data-toggle="tab" href="#menu1">Thay đổi mật khẩu</a></li>

    </ul>

    <div class="tab-content">
        <div id="menu0" class="tab-pane fade in active">
            @include('site.user.infor.updateInformation')
        </div>
        <div id="menu1" class="tab-pane fade">
            @include('site.user.infor.updatePassword')
        </div>

    </div>

</div>


@endsection