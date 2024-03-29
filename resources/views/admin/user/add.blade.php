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
    @include('admin.partials.content-header', ['name' => 'User', 'key' => 'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên</label> <span class="must text-danger font-weight-bold">(*)</span>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên"
                                value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label> <span class="must text-danger font-weight-bold">(*)</span>
                            <input type="text" class="form-control" name="email" placeholder="Nhập email"
                                value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label> <span class="must text-danger font-weight-bold">(*)</span>
                            <input type="password" class="form-control" name="password" placeholder="Nhập password">
                        </div>
                        <div class="form-group">
                            <label>Chọn vai trò</label> <span class="must text-danger font-weight-bold">(*)</span>
                            <select name="role_id[]" class="form-control select2_init" multiple>
                                <option value=""></option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection