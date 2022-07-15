@extends('site.layouts.master')
@section('title')
<title>User Address</title>

@section('content')
<div class="container ">

    <div class="row">

    </div>
    <div class="col-md-12">
        <div class="col-md-6" style="float:right;">
            <button name="checkout" id="checkout" class=" btn btn-fefault cart" style="width: 150px; float:right;"> TIẾP
                TỤC</button>
        </div>
    </div>

</div>

@endsection

@section('js')
<script>
    function checkStore() {
       $checkStore = document.getElementById("delivery_store");
       if($checkStore.checked) {
          document.getElementById("delivery").innerHTML = "";
          toastr.success('Nhân viên hỗ trợ sẽ gọi điện tư vấn cửa hàng gần nhất với bạn!', 'Success');
       }
    }
   
    function checkCod() {
       $checkStore = document.getElementById("delivery_cod");
       if($checkStore.checked) {
          document.getElementById("delivery").innerHTML = 
          `<div class="col-md-6 form-information">
              <h3> ĐỊA CHỈ GIAO HÀNG </h3>
              <form action="" method="post">
                  @csrf
                  <div class="form-row">
                      </label>
                      <div class="address_list">
                          
                          @foreach ($user_address->address_list as $address_listItem)
                          <div class="address_list_item">
                            <p style="float:right;"><input type ="radio" name ="address_id" id = "address_id" value = "{{$address_listItem->id}}" onclick= "getAddressId()"/></p>
                              <p><i class="fa fa-user">&ensp;{{$address_listItem->other_name}}</i></p>
                              <p><i class="fa fa-phone">&ensp;{{$address_listItem->other_phone}}</i></p>
                              <p><i class="fa fa-map-marker"> &ensp;{{$address_listItem->other_address_id.',
                                      '.$ward->getWardName($address_listItem->other_ward_id).', '.
                                      $district->getDistrictName($address_listItem->other_district_id).',
                                      '.$provinceModel->getProvinceName($address_listItem->other_province_id)}}</i></p>

                                                               
                      
                          </div>
                          @endforeach

                      </div>    
  
                  </div>
                
              </form>
          </div>`;
       }
    }
</script>
<script>
    function getAddressId() {     
        var id = document.querySelector('input[name="address_id"]:checked').value;
        return id;
    }

    $('#checkout').click(function(){
  
     let address_id=getAddressId();
     $.ajax({
         url:'/user/checkout/index/' + address_id,
         type:'post',
         data:'&_token={{csrf_token()}}',

         success:function(data){
            toastr.success('OK', 'Success');
         },
         error:function() {
            toastr.error('Vui lòng chọn địa chỉ', 'Error');
    }
     });
 });
</script>

@endsection