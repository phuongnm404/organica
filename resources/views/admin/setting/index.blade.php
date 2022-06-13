@extends('admin.layouts.admin')

@section('title')
<title>Setting</title>

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
    'name' => 'Setting',
    'key' => 'List'
    ])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            Action
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route ('admin.setting.create').'?type=Text'}}">Text</a></li>
                            <li><a href="{{ route ('admin.setting.create').'?type=Textarea'}}">Text Area</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên setting</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Thao tác</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($settings as $setting)
                            <tr>
                                <th scope="row">{{$setting->id}}</th>

                                <td>{{$setting->config_key}}</td>
                                <td>{{$setting->config_value}}</td>


                                <td>
                                    <a href="{{ route('admin.setting.edit', ['id' => $setting->id]) . '?type=' . $setting->type}}"
                                        class="btn btn-primary">Edit</a>
                                    <a href="" data-url="{{ route('admin.setting.delete', ['id' => $setting->id]) }}"
                                        class="btn btn-danger action_delete">Xóa</a>

                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12" class="float-right">
                    {{ $settings->links() }}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection