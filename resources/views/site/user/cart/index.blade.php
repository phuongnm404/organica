@extends('site.layouts.master')
@section('title')
<title>User Address</title>

@section('content')
<div class="container ">
  <div class="row ">

    <div class="col-md-12 d-flex justify-content-center ">
      <div class="cart-wrapper">
        @include('site.user.cart.components.cart_component1')
      </div>
    </div>
    <div class="sugesst-product">
      @include('site.home.components.feature')
    </div>
  </div>


</div>

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
<script>
  function checkStore() {
     $checkStore = document.getElementById("delivery_store");
     if($checkStore.checked) {
        toastr.success('Nhân viên hỗ trợ sẽ gọi điện tư vấn cửa hàng gần nhất với bạn!', 'Success');
     }
  }
  const radioButtons = document.querySelectorAll('input[id="delivery_cod"]');
        for(const radioButton of radioButtons){
            radioButton.addEventListener('change', showSelected);
        }        
        
        function showSelected(e) {
            console.log(e);
            if (this.checked) {
                document.querySelector('#output').innerText = `You selected ${this.value}`;
            }
        }
  function checkCod() {
     $checkStore = document.getElementById("delivery_cod");
     if($checkStore.checked) {
        toastr.success('Load khung chọn địa chỉ', 'Success');
     }
  }
</script>

@endsection