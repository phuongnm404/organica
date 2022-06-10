@extends('admin.layouts.admin')

@section('title')
<title>Them danh muc</title>

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header', [
    'name' => 'Category',
    'key'=> 'Edit'
    ]);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-4">
                    <form action="{{ route('admin.category.update', ['id'=> $category->id])}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category-name">Tên danh mục</label>
                            <input type="text" name="name" class="form-control" id="category-name"
                                value="{{$category->name}}" placeholder="Nhập tên danh mục">
                        </div>
                        <div class="form-group">
                            <label>Chọn tên danh mục cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">-Chọn danh mục cha-</option>
                                {!!$htmlOption!!}
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