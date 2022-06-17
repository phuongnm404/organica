@extends("site.layouts.master")
<!--/head-->
@yield('css')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('site.product.components.sidebar')
                @include('site.product.components.filter_brand')
            </div>
            <div class="col-sm-9  padding-right">
                aaaaa
            </div>
        </div>
    </div>
</section>


@endsection