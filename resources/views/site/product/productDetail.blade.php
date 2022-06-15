@extends("site.layouts.product_master")

<!--/head-->
@yield('css')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('site.product.components.sidebar')
            </div>
            <div class="col-sm-9  padding-right">
                @include('site.product.components.list_product_category')
            </div>
        </div>
    </div>
</section>
@endsection
@yield('css')