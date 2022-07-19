@extends('admin.layouts.admin')

@section('title')
<title>Them user</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
@endsection
@section('js')
<script src="{{asset('vendors/select2/select2.min.js')}}"></script>

<script src="{{asset('adminn/user/add/add.js')}}"></script>
@endsection


@section('content')

<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'User', 'key' => 'Edit'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('admin.user.update', ['id'=> $users->id])}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên user</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                placeholder="Nhập tên" value="{{ $users->name}}">

                        </div>

                        <div class="form-group">
                            <label>Email</label>

                            <input class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Nhập email" value="{{ $users->email }}">
                        </div>
                        <div class="form-group">
                            <label>Điện thoại</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="name"
                                placeholder="Nhập điện thoại" value="{{ $users->phone}}">

                        </div>

                        <div class="form-group">
                            <label>Giới tính</label>

                            <input class="form-control @error('gender') is-invalid @enderror" name="gender"
                                placeholder="Nhập giới tính" value="{{ $users->gender }}">
                        </div>
                        <div class="form-group">
                            <label>Sinh nhật</label>
                            <input type="text" class="form-control @error('birthday') is-invalid @enderror"
                                name="birthday" placeholder="Nhập sinh nhật" value="{{ $users->birthday}}">

                        </div>



                        {{-- <div class="form-group">
                            <label>Password</label>

                            <input class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Nhập password">
                        </div> --}}
                        {{-- <div class="form-group">
                            <label>Chọn vai trò</label>
                            <select name="role_id[]"
                                class="form-control select2_init @error('role_id') is-invalid @enderror"
                                multiple="multiple">
                                <option value=""></option>

                                @foreach($roles as $role)
                                <option {{ $roleOfUser->contains('id', $role->id) ? 'selected' : '' }}
                                    value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach

                            </select>
                            @error('role_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection