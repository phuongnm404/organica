@extends('admin.layouts.admin')

@section('title')
<title>Sua tag</title>
@endsection

@section('css')

@endsection


@section('content')

<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'Tag', 'key' => 'Edit'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.static.update', ['id' => $static->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên đặc trưng tĩnh</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên"
                                value="{{$static->name }}">

                        </div>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection