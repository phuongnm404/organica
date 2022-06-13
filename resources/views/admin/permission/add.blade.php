@extends('admin.layouts.admin')

@section('title')
<title>Them danh muc</title>

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header', [
    'name' => 'Permission',
    'key'=> 'Add'
    ]);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <form action="{{ route('admin.permissions.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Chọn tên module</label>
                            <select class="form-control" name="module_parent">
                                <option value="">--Chọn--</option>

                                @foreach(config('permissions.table_module') as $moduleItem)
                                <option value="{{ $moduleItem }}">{{ $moduleItem }}</option>
                                @endforeach



                                {{-- {!!$optionSelect!!} --}}
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                @foreach(config('permissions.module_children') as $moduleItemChilren)
                                <div class="col-md-3">
                                    <label for="">
                                        <input type="checkbox" value="{{ $moduleItemChilren }}" name="module_chilren[]">
                                        {{ $moduleItemChilren }}
                                    </label>
                                </div>
                                @endforeach

                            </div>
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