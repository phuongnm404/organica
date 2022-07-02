@extends('site.layouts.master')

@section('title')
<title>User Profile</title>

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-8 form-information">
            <h3>THÔNG TIN CÁ NHÂN</h3>
            <form action="{{route('user.infor.update', ['id'=>$user->id])}}" method="post">
                @csrf
                <div class="form-row">
                    <label>Họ và tên <span class="must font-weight-bold">(*)</span>
                    </label>
                    <input type="text" class="form-control" id="user-name" name="name"
                        placeholder="Nhập họ và tên của bạn" value="{{$user->name}}" required>
                </div>
                <div class="form-row row">
                    <div class="col-md-3">
                        <label>Giới tính<span class="must font-weight-bold">(*)</span>
                        </label>
                    </div>
                    <div class="col-md-3">
                        <input class="form-check-input" type="radio" name="gender" id="male_gender" value="Nam" {{
                            $user->gender == 'Nam' ? "checked" : ''}}>

                        <label class="form-check-label" for="radio2"> Nam</label> &ensp; &ensp;

                        <input type="radio" class="form-check-input" id="radio1" name="gender" value="Nữ" {{
                            $user->gender == 'Nữ' ? "checked" : ''}}>

                        <label class="form-check-label" for="radio1">Nữ</label>

                    </div>

                </div>
                <div class="form-row">
                    <label class="special-label">Ngày sinh <span class="must font-weight-bold">(*)</span></label>
                    <input type="text" class="form-control" id="birthday" name="birthday" required value="{{ date("
                        d-m-Y", strtotime($user->birthday)) }}">

                </div>
                <div class="form-row row">

                    <div class="col-md-3">
                        <label for="province">Tỉnh/
                            Thành <span class="must font-weight-bold">(*)</span></label>
                        <select class="form-select" name="province_id" id="province_user_id" required>
                            @foreach ($province_list as $value)
                            @if ($value->id == $user->province_id)
                            <option value="{{ $value->id }}" selected>{{ $value->province_name }}</option>
                            @else
                            <option value="{{$value->id}}">{{$value->province_name}}</option>
                            @endif
                            @endforeach


                        </select>

                    </div>
                    <div class="col-md-3">
                        <label for="district">Quận/Huyện <span class="must font-weight-bold">(*)</span></label>
                        <select class="form-select" name="district_id" id="district_user_id" required>
                            @foreach ($district->getDistrict($user->district_id) as $value)
                            @if ($value->id == $user->district_id)
                            <option value="{{ $value->id }}" selected>{{ $value->district_name }}</option>
                            @else
                            <option value="{{ $value->id }}">{{ $value->district_name }}</option>
                            @endif
                            @endforeach
                        </select>

                    </div>
                    <div class=" col-md-3">
                        <label for="ward">Phường/Xã <span class="must font-weight-bold">(*)</span></label>
                        <select class="form-select" name="ward_id" id="ward_user_id" required>
                            @foreach ($ward->getWard($user->ward_id) as $value)
                            @if ($value->id == $user->ward_id)
                            <option value="{{ $value->id }}" selected>{{ $value->ward_name }}</option>
                            @else
                            <option value="{{ $value->id }}">{{ $value->ward_name }}</option>
                            @endif
                            @endforeach
                        </select>

                    </div>



                </div>
                <div class="form-row">
                    <label>Địa chỉ cụ thể <span class="must font-weight-bold">(*)</span>
                    </label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Số nhà, ngõ, đường"
                        value="{{$user->address}}">
                </div>
                <div class="form-row">
                    <label> Email <span class="must font-weight-bold">(*)</span></label>
                    <input type="text" name="email" id="email" class="form-control" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}"
                        placeholder="abc@email.com" required value="{{$user->email}}" data-parsley-type='email'>
                </div>
                <div class="form-row">
                    <label>Số điện thoại <span class="must font-weight-bold">(*)</span>
                    </label>
                    <input type="text" class="form-control" id="phone" name="phone" required value="{{$user->phone}}">
                </div>
                <div class="form-row">
                    <button class="btn btn-sucess " style="background: green; float:right; color: white"> Lưu</button>
                </div>
            </form>

        </div>
        <div class="col-md-4 form-information">
            <h3>THAY ĐỔI MẬT KHẨU</h3>
            <form action="{{route('user.infor.updatePass', ['id'=>$user->id])}}" method="post">
                @csrf
                <div class="form-row">
                    <label>Mật khẩu hiện tại<span class="must font-weight-bold">(*)</span>
                    </label>
                    <input type="password" class="form-control" name="recent_pass" placeholder="Nhập họ và tên của bạn"
                        value="{{$user->password}}" required>
                </div>
                <div class="form-row">
                    <label>Mật khẩu mới <span class="must font-weight-bold">(*)</span>
                    </label>
                    <input type="password" class="form-control" name="new_pass" required>
                </div>
                <div class="form-row">
                    <button class="btn btn-sucess " style="background: green; float:right; color: white"> Lưu</button>
                </div>
            </form>

        </div>

    </div>
</div>


@endsection