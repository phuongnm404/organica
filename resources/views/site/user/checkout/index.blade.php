@extends('site.layouts.master')
@section('title')
<title>User Address</title>

@section('content')
<div class="container ">

    <div class="row">
        <div class="col-md-12 form-information d-flex justify-content-center ">
            <div class="cart-delivery">
                <div class="box_address" style="margin: 10px;">
                    <div class="col-md-3 ">
                        <p>Quý khách muốn: </p>
                    </div>
                    <div class="col-md-3">
                        <input type="radio" name="delivery" id="delivery_store" onclick="checkStore()"
                            value="Đến lấy tại cửa hàng"> Đến lấy tại
                        cửa
                        hàng
                        <div class="address_list_item" hidden>
                            <p style="float:right;"><input type="radio" name="address_id_default"
                                    id="address_id_default" value="{{$address_default[0]->id}}"
                                    onclick="getAddressDefaultId()" checked /></p>
                            <p><i class="fa fa-user">&ensp;{{$address_default[0]->name}}</i></p>
                            <p><i class="fa fa-phone">&ensp;{{$address_default[0]->phone}}</i></p>
                            <p><i class="fa fa-map-marker"> &ensp;{{$address_default[0]->address_detail.',
                                    '.$ward->getWardName($address_default[0]->ward_id).', '.
                                    $district->getDistrictName($address_default[0]->district_id).',
                                    '.$provinceModel->getProvinceName($address_default[0]->province_id)}}</i></p>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <input type="radio" name="delivery" id="delivery_cod" onclick="checkCod()" value="Giao hàng">
                        Giao hàng
                    </div>

                </div>

            </div>

        </div>
        <div id="delivery" class="col-md-12 d-flex justify-content-center"> </div>
        <div class="col-md-12 form-information d-flex justify-content-center ">
            <h4>GHI CHÚ</h4>
            <div class="cart-note">
                <textarea id="note" name="note" class="form-control note-text" rows="2"
                    placeholder="Hãy cho chúng tôi biết thêm về yêu cầu riêng của quý khách về hàng hóa, hình thức, vận chuyển, liên hệ"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <input id="status" type="hidden" value="Đang chờ xác nhận" name="status">
        </div>

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
                        
                          @foreach ($user_address->address as $address_listItem)
                          <div class="address_list_item">
                            <p style="float:right;"><input type ="radio" name ="address_id" id = "address_id" value = "{{$address_listItem->id}}" onclick= "getAddressId()"/></p>
                              <p><i class="fa fa-user">&ensp;{{$address_listItem->name}}</i></p>
                              <p><i class="fa fa-phone">&ensp;{{$address_listItem->phone}}</i></p>
                              <p><i class="fa fa-map-marker"> &ensp;{{$address_listItem->address_detail.',
                                      '.$ward->getWardName($address_listItem->ward_id).', '.
                                      $district->getDistrictName($address_listItem->district_id).',
                                      '.$provinceModel->getProvinceName($address_listItem->province_id)}}</i></p>
                                @if ($address_listItem->default == 1 )
                                <p><i class="fa fa-check">&ensp;Mặc định</i></p>
                                @endif
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
    function getMethodDelivery() {
        var delivery = document.querySelector('input[name="delivery"]:checked').value;
        return delivery;
    }
    function getAddressDefaultId() {     
        var id = document.querySelector('input[name="address_id_default"]:checked').value;
        return id;
    }


    $('#checkout').click(function(){
       
      let address_id;
     let delivery = getMethodDelivery();
     let note = $('textarea#note').val();
     let status =  $('input#status').val();
    
        

     if(delivery == "Đến lấy tại cửa hàng") {
        address_id = getAddressDefaultId();
        console.log(getAddressDefaultId());
     } else {
        address_id = getAddressId();
        console.log(getAddressId());
     }
     
    

     $.ajax({
         url:'/user/checkout/index/' + address_id,
         type:'post',
         data: jQuery.param({ 
            id: address_id, 
            delivery : delivery, 
            note: note,
            status: status,
            "_token": "{{ csrf_token() }}",
        }) , 
         success:function(data){
            toastr.success('Mua hàng thành công! Vui lòng chờ xác nhận của chúng tôi.', 'Success');
         },
  
     });
    });
</script>

@endsection