@extends('admin.layouts.admin')

@section('title')
<title>Role</title>
@endsection

@section('css')

<style>
    .card-header {
        background-color: #92c7a9;
    }
</style>
@endsection

@section('js')
<script>
    $('.checkbox_wrapper').on('click', function () {
        $(this).parents('.card').find('.checkbox_children').prop('checked', $(this).prop('checked'));
    });
    $('.checkAll').on('click', function () {
        $(this).parents().find('.checkbox_children').prop('checked', $(this).prop('checked'));
        $(this).parents().find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));

    });

</script>
@endsection


@section('content')

<div class="content-wrapper">
    @include('admin.partials.content-header', ['name' => 'Roles', 'key' => 'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('admin.role.store')}}" method="post" enctype="multipart/form-data"
                    style="width: 100%;">
                    <div class="col-md-12">
                        @csrf
                        <div class="form-group">
                            <label>Tên vai trò</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên vai trò"
                                value="{{ old('name') }}">

                        </div>

                        <div class="form-group">
                            <label>Mô tả vai trò</label>

                            <textarea class="form-control" name="display_name"
                                rows="4">{{ old('display_name') }}</textarea>

                        </div>


                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">
                                    <input type="checkbox" name="" id="" class="checkAll">
                                    check all
                                </label>
                            </div>
                            @foreach($permissionsParent as $permissionsParentItem)
                            <div class="card border-primary mb-3 col-md-12">
                                <div class="card-header">
                                    <label>
                                        <input type="checkbox" value="" class="checkbox_wrapper">
                                    </label>
                                    Module {{ $permissionsParentItem->name }}
                                </div>
                                <div class="row">
                                    @foreach($permissionsParentItem ->permissionsChildren as $permissionsChildrentItem)
                                    <div class="card-body text-primary col-md-3">
                                        <h5 class="card-title">
                                            <label>
                                                <input type="checkbox" name="permission_id[]"
                                                    value="{{ $permissionsChildrentItem->id }}"
                                                    class="checkbox_children">
                                            </label>
                                            {{ $permissionsChildrentItem->name }}
                                        </h5>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach


                        </div>


                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>


            </div>
        </div>
    </div>

</div>

@endsection