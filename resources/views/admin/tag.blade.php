@extends('admin.layouts.admin')

@section('title')
<title>Them san pham</title>

@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header', [
    'name' => 'Product',
    'key'=> 'Add'
    ]);
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('admin.tag.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Tags</label>
                            <select name="tags[]"
                                class="form-control tags_select_choose @error('tags') is-invalid @enderror"
                                multiple="multiple">
                                @foreach ($tags as $tagItem )
                                <option value="">{{$tagItem->name}}</option>
                                @endforeach



                            </select>

                        </div>

                        <button type="submit" class="btn btn-primary float-right">Thêm</button>
                    </div>
                </div>

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

@section('js')

<script src="{{asset('vendors/select2/select2.min.js')}}"></script>

<script src="{{asset('adminn/product/add/add.js')}}"></script>

@endsection