@extends('admin.layouts.admin')

@section('title')
<title>Slide</title>

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
    'name' => 'Slider',
    'key' => 'List'
    ])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="{{route('admin.slider.create')}}" class="btn btn-success float-right m-2">Thêm</a>
                </div>
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Thao tác</th>


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($sliders as $slider)
                            <tr>
                                <th scope="row">{{$slider->id}}</th>

                                <td>{{$slider->name}}</td>
                                <td>{{$slider->description}}</td>
                                <td>
                                    <img class="image_slider_150_100" src="{{ $slider->image_path }}" alt="">

                                </td>

                                <td>
                                    <a href="{{ route('admin.slider.edit', ['id' => $slider->id]) }}"
                                        class="btn btn-primary">Edit</a>

                                    <a href="" data-url="{{ route('admin.slider.delete', ['id' => $slider->id]) }}"
                                        class="btn btn-danger action_delete">Xóa</a>

                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12" class="float-right">
                    {{ $sliders->links() }}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection