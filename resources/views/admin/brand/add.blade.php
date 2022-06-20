@extends('admin.layouts.admin')

@section('title')
<title>Them thường hiệu</title>
@endsection

@section('css')

@endsection


@section('content')

<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'Brand', 'key' => 'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên thương hiệu</label> <span class="must text-danger font-weight-bold">(*)</span>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên"
                                value="{{ old('name') }}">

                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection