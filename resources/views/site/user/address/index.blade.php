@extends('site.layouts.master')
@section('title')
<title>User Address</title>

@section('content')
<div class="container">
    <div class="col-md-6 form-information">
        <h3> ĐỊA CHỈ GIAO HÀNG </h3>
        <form action="" method="post">
            @csrf
            <div class="form-row">
                <label>Địa chỉ giao hàng hiện tại</span>
                </label>
                <div class="address_list">
                    <div class="address_list_item">
                        <p style="float:right;"><i class="fa fa-pencil"><a data-toggle="modal" data-target="#EditModal">
                                    Sửa
                                </a></i></p>
                        <p><i class="fa fa-user">&ensp;{{$user->name}}</i></p>
                        <p><i class="fa fa-phone">&ensp;{{$user->phone}}</i></p>
                        <p><i class="fa fa-map-marker"> &ensp;{{$user->address.',
                                '.$ward->getWardName($user->ward_id).', '.
                                $district->getDistrictName($user->district_id).',
                                '.$provinceModel->getProvinceName($user->province_id)}}</i></p>
                        <p><i class="fa fa-check"> Mặc định</i></p>
                    </div>
                    @foreach ($user_address->address_list as $address_listItem)
                    <div class="address_list_item">
                        <p style="float:right;"><i class="fa fa-pencil"><a data-toggle="modal" data-target="#EditModal">
                                    Sửa
                                </a></i></p>

                        <p><i class="fa fa-user">&ensp;{{$address_listItem->other_name}}</i></p>
                        <p><i class="fa fa-phone">&ensp;{{$address_listItem->other_phone}}</i></p>
                        <p><i class="fa fa-map-marker"> &ensp;{{$address_listItem->other_address_id.',
                                '.$ward->getWardName($address_listItem->other_ward_id).', '.
                                $district->getDistrictName($address_listItem->other_district_id).',
                                '.$provinceModel->getProvinceName($address_listItem->other_province_id)}}</i></p>
                        <p style="float:right;"><i class="fa fa-ban"><a href=""
                                    data-url="{{ route('user.address.deleteAddress', ['id' => $address_listItem->id]) }}"
                                    class="action_delete">
                                    Xóa
                                </a></i></p>
                    </div>
                    @endforeach
                </div>

            </div>
            <div class="form-row">
                <label>Bạn muốn giao hàng đến địa chỉ khác? <a data-toggle="modal" data-target="#CreateModal">
                        Thêm địa chỉ giao
                        hàng
                    </a></span>
                </label>

            </div>

        </form>

    </div>

</div>
@include('site.user.address.insertAddress')
@include('site.user.address.editAddress')
@endsection

@section('js')
<script>
    $(document).ready(function() {

    });
    function create() {
        $("#exampleModal").modal('show');
    }
</script>
<script>
    $( function() {
        
          jQuery(document).ready(function(){
            jQuery('#province_other_id').change(function(){
              let provinceId=jQuery(this).val();
              
              jQuery('#ward_other_id').html('<option value = "">--Chọn--</option>')

              jQuery.ajax({
                url:"{{route('site.address.district')}}",
                type:'post',
                data:'provinceId='+provinceId+'&_token={{csrf_token()}}',
                success:function(result){
                   jQuery('#district_other_id').html(result)
                }
              });
            });     
            jQuery('#district_other_id').change(function(){
              let districtId=jQuery(this).val();
              jQuery.ajax({
                url:"{{route('site.address.ward')}}",
                type:'post',
                data:'districtId='+districtId+'&_token={{csrf_token()}}',
                success:function(result){
                  jQuery('#ward_other_id').html(result)
                }
              });
			      });
		      });
    });
</script>
@endsection