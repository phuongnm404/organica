@extends('admin.layouts.admin')

@section('title')
<title>Tag</title>

@section('css')

@endsection
@section('js')
<script src="{{ asset('vendors/alert/sweetalert2@11.js') }}"></script>
<script type="text/javascript" src="{{ asset('adminn\main.js') }}"></script>
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header',[
    'name' => 'Static',
    'key' => 'List'
    ])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{route('admin.static.create')}}" class="btn btn-success float-right m-2">Thêm</a>
                </div>
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên đặc trưng tĩnh</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($statics as $staticItem)
                            <tr>
                                <th scope="row">{{$staticItem->id}}</th>

                                <td>{{$staticItem->name}}</td>

                                <td>
                                    <a href="{{ route('admin.static.edit', ['id' => $staticItem->id]) }}"
                                        class="btn btn-primary">Sửa</a>

                                    <a href="" data-url="{{ route('admin.static.delete', ['id' => $staticItem->id]) }}"
                                        class="btn btn-danger action_delete">Xóa</a>

                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12" class="float-right">
                    {{ $statics->links() }}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection