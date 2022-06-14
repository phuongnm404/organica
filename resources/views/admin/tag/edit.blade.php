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
                    <form action="{{ route('admin.tag.update', ['id' => $tag->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên tag</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên"
                                value="{{$tag->name }}">

                        </div>
                        <button type="submit" class="btn btn-primary">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection