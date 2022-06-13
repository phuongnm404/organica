@extends('admin.layouts.admin')

@section('title')
<title>Them danh muc</title>

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header', [
    'name' => 'Menu',
    'key'=> 'Add'
    ]);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-4">
                    <form action="{{ route('admin.menu.update', ['id'=> $menuFollowIdEdit->id])}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category-name">Tên menu</label>
                            <input type="text" name="name" class="form-control" id="category-name"
                                value="{{$menuFollowIdEdit->name}}" placeholder="Nhập tên menu">
                        </div>
                        <div class="form-group">
                            <label>Chọn menu cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">-Chọn menu cha-</option>
                                {!!$optionSelect!!}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Sửa</button>
                    </form>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection