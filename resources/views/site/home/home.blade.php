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
                {{-- @include('site.home.components.feature') --}}

                <!--/category-tab-->
                {{-- @include('site.home.components.categorytab') --}}

                <!--recommenr_items-->
                @include("site.home.components.recommend")


            </div>
        </div>
    </div>
</section>
@include('site.home.components.ad')

@section('js')
<script>
    $('#request').click(function(){
            let cart_id =  $('input#cart_id').val();
            let user_id =  $('input#user_id').val();

           ;
            $.ajax({
                url:'/admin/inbox/store',
                type:'post',
                data: jQuery.param({ 
                    user_id : user_id, 
                    cart_id: cart_id, 
                    "_token": "{{ csrf_token() }}",
                }),
                 
                //console.log(data);
                success:function(data){
                    //console.log(data)
                    toastr.success('Cảm ơn bạn đã đóng góp ý kiến!', 'Success');
                },
            });
    });
</script>

@endsection
@endsection