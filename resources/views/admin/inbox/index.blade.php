@extends('admin.layouts.admin')

@section('title')
<title>Trang chu</title>

@section('js')
<script src="{{ asset('vendors/alert/sweetalert2@11.js') }}"></script>
<script type="text/javascript" src="{{ asset('adminn\main.js') }}"></script>
@endsection


@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header',[
    'name' => 'Inbox',
    'key' => 'List'
    ])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Tin nhắn</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inbox as $inboxItem)
                            <tr>
                                <th scope="row">{{$inboxItem->id}}</th>
                                <td>{{$inboxItem->message}}</td>
                                <td>Khách hàng {{$inboxItem->user_id}} muốn hủy đơn số {{$inboxItem->cart_id}}</td>
                                <td>
                                    <a href="{{route('admin.order.edit', ['id' => $inboxItem->cart_id])}}"
                                        class="btn btn-primary">Xem</a>
                                    <a href="" class="btn btn-danger action_delete">Xóa</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12" class="float-right">
                    {{-- {{ $category->links() }} --}}
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection