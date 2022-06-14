@extends("site.layouts.master")
<!--/head-->
@yield('css')

@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 padding-right">

                <!--features_items-->
                @include('site.components.feature')

                <!--/category-tab-->
                @include('site.components.categorytab')

                <!--recommenr_items-->
                @include("site.components.recommend")


            </div>
        </div>
    </div>
</section>
@endsection