<div class="cart-list" data-url="{{route('deleteCart')}}">
    @if (isset($carts) && count($carts) > 0)
    <form action="" method="post">
        <div class="col-md-12 form-information d-flex justify-content-center">
            <div class="box_address" style="margin: 10px;">
                <div class="col-md-3 ">
                    <p>Quý khách muốn: </p>
                </div>
                <div class="col-md-3">
                    <input type="radio" name="delivery" id="delivery_store" onclick="checkStore()"> Đến lấy tại cửa hàng
                </div>
                <div class="col-md-3">
                    <input type="radio" name="delivery" id="delivery_cod" onclick="checkCod()"> Giao hàng
                </div>
            </div>
        </div>

        <table class="table update_card_url" data-url={{ route('updateCart')}}>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Tổng</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $total = 0;
                @endphp
                @foreach($carts as $id => $cartItem)
                @php
                $total += $cartItem['price'] * $cartItem['quantity'] ;
                @endphp

                <tr>
                    <td></td>
                    <td>
                        <img style="width: 100px; height: 100px;" src="{{ $cartItem['feature_image_path']}}" alt="">
                    </td>
                    <td> <b>{{ $cartItem['name']}} <br></b>{{ $cartItem['weight']}}</td>
                    <td>{{number_format( $cartItem['price'] ) }}<sup>đ</sup>
                        <input type="hidden" class="price" value="{{$cartItem['price']}}">
                    </td>
                    <td>
                        <input type="number" value="{{$cartItem['quantity']}}" min="1" max="10" class="quantity"
                            onchange="subTotal()">
                    </td>
                    <td class="itotal">
                        {{number_format( $cartItem['price'] * $cartItem['quantity'] ) }}<sup>đ</sup>

                    </td>
                    <td>
                        {{-- <a href="" data-id="{{$id}}" class="btn btn-primary cart_update">Cập nhật</a> --}}
                        <a href="" data-id="{{$id}}" class="btn btn-danger cart_delete w-50">Xóa</a>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                    </td>
                    <td>

                    </td>
                    <td>
                        <h5>Tạm tính</h5>
                    </td>
                    <td>{{number_format($total)}}<sup>đ</sup></td>
                    <td>
                        <button type="submit" class="btn btn-primary">
                            Thanh toán
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    </form>
    @else
    <div class="box-notice" style="margin: 20px;">
        <div class="text-notice text-center">
            <p> Rất tiếc quý khách chưa có sản phẩm trong giỏ hàng.
                Hãy tiếp tục mua sắm cùng Organica nhé. Xin cám ơn.</p>
            <button class="btn btn-fefault cart" style="width: 400px;">TIẾP TỤC MUA HÀNG</button>
        </div>
    </div>

    @endif


</div>