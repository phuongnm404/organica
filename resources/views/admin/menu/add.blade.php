@extends('admin.layouts.admin')

@section('title')
<title>Them menu</title>

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
                    <form action="{{ route('admin.menu.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="category-name">Tên menu</label> <span
                                class="must text-danger font-weight-bold">(*)</span>
                            <input type="text" name="name" class="form-control" id="category-name"
                                placeholder="Nhập tên menu">
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Thêm</button>
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