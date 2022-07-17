@extends("site.layouts.master")

<!--/head-->
@section('content')
@include("site.home.components.slider")

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 padding-right">
                <!--discount item-->
                @include('site.home.components.discount')

                <!--features_items-->
                @include('site.home.components.feature')

                <!--/category-tab-->
                @include('site.home.components.categorytab')

                <!--recommenr_items-->
                @include("site.home.components.recommend")


            </div>
        </div>
    </div>
</section>
@include('site.home.components.ad')


@endsection