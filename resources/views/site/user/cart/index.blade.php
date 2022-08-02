@extends('site.layouts.master')
@section('title')
<title>Giỏ hàng</title>

@section('content')
<div class="container ">
  <div class="row ">

    @php
    $content = Cart::content();
    @endphp
    @if(isset($content) && count($content)>0)

    <div class="col-md-12 form-information d-flex justify-content-center ">
      <div class="cart-wrapper">
        <section id="cart_items">
          <div class="table-cart_info">

            <h5> <b>GIỎ HÀNG CỦA BẠN</b> </h5>
            <table class="table cart-menu">
              <thead>
                <tr>
                  <td>Ảnh</td>
                  <td>Tên sản phẩm</td>
                  <td>Giá</td>
                  <td>Số lượng</td>
                  <td>Tổng giá</td>
                  <td></td>
                </tr>
              </thead>
              <tbody>
                @foreach ($content as $value)
                <tr>
                  <td>
                    <a href=""><img src="{{ URL::to($value->options->image)}}" alt="" style="width: 100px;"></a>
                  </td>
                  <td>
                    <h5><b>{{$value->name}}</b> </h5>

                  </td>
                  <td>
                    <p>{{number_format($value->price)}} <sup>đ</sup></p>
                  </td>

                  <td>
                    <div class="cart_quantity_button">
                      <form action="{{route('updateQty', ['rowId'=> $value->rowId])}}" method="POST">
                        @csrf

                        {{-- <div class="cart_quantity_button">
                          <a class="cart_quantity_up" href="{{route('tangQty', ['rowId'=> $value->rowId])}}"> + </a>
                          <input class="cart_quantity_input" style="width: 50px;" type="number" name="cart_quantity"
                            value="{{$value->qty}}" size="2" min="1" max="10">
                          <a class="cart_quantity_down" href="{{route('giamQty', ['rowId'=> $value->rowId])}}"> - </a>
                        </div> --}}
                        <input class="cart_quantity_input" style="width: 50px;" type="number" name="cart_quantity"
                          value="{{$value->qty}}" size="2" min="1" max="10">

                        <input type="hidden" value="{{$value->rowId}}}" name="rowId_cart">
                        <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default small">
                      </form>

                    </div>
                  </td>

                  </td>
                  <td>
                    <p class="cart_total_price"><b>{{number_format($value->price * $value->qty)}}
                        <sup>đ</sup></b>
                    </p>
                  </td>
                  <td>
                    <a class="cart_quantity_delete" href="{{URL::to('/user/cart/delete-to-cart/'.$value->rowId)}}"><i
                        class="fa fa-times"></i></a>
                  </td>
                </tr>

                @endforeach
                {{--
                <tr>
                  <td></td>
                  <td>
                  <td></td>
                  </td>

                  <td>Tạm tính</td>
                  <td style=" border-top: 1px solid green;">
                    <h4 class="cart_total_price">{{Cart::subtotal()}} <sup>đ</sup></h4>
                  </td>

                </tr>
                <tr>
                  <td></td>
                  <td>
                  <td></td>
                  </td>

                  <td>Phí vận chuyển</td>
                  <td>
                    <h4>30.000<sup>đ</sup></h4>
                  </td>

                </tr> --}}
                <tr>
                  <td></td>
                  <td>
                  <td></td>
                  </td>

                  <td>Tổng tiền</td>
                  <td style=" border-top: 1px solid green;">
                    <h4 class="cart_total_price">{{Cart::subtotal()}} <sup>đ</sup></h4>
                  </td>

                </tr>

              </tbody>
            </table>

          </div>

        </section>
        <!--/#cart_items-->
      </div>
    </div>

    <div class="col-md-12">
      <div class=" col-md-6 box-note">
        <div class="text-notice">
          <p>
            Organica chỉ áp dụng giao hàng cho đơn hàng trên 200.000 VNĐ. Đơn hàng sẽ được giao từ
            <b>9:00</b>
            đến <b>18:00</b> và ít nhất 3 tiếng sau khi chúng tôi tiếp nhận đơn hàng. Những đơn hàng
            được đặt
            sau <b>4:30</b> sẽ được giao vào ngày hôm sau. Vui lòng xem thêm Chính sách giao hàng của
            Organica.
          </p>
          <b>Phí vận chuyển mỗi đơn hàng là 30.000 VNĐ sẽ được cộng vào tổng hóa đơn thanh toán.</b>
        </div>
      </div>
      <div class="col-md-6">
        <a href="{{route('checkout.index')}}" type='submit' class=" btn btn-fefault cart"
          style="width: 150px; float:right;"> MUA HÀNG</a>

      </div>

    </div>
    @else

    <div class="box-notice" style="margin: 20px;">
      <div class="text-notice text-center">
        <p> Rất tiếc quý khách chưa có sản phẩm trong giỏ hàng.
          Hãy tiếp tục mua sắm cùng Organica nhé. Xin cám ơn.</p>
        <a href="{{route('home.index')}}">
          <button class="btn btn-fefault cart" style="width: 400px;">TIẾP TỤC MUA HÀNG</button> </a>
      </div>
    </div>


    @endif

    {{-- <div class="sugesst-product">
      @include('site.home.components.feature')
    </div> --}}

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


@endsection