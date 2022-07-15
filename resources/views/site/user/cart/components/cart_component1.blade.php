<section id="cart_items">
    <div class="table-cart_info">
        @php
        $content = Cart::content();
        @endphp
        @if(isset($content) && count($content)>0)

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

                            <input class="cart_quantity_input" style="width: 50px;" type="number" name="quantity"
                                value="{{$value->qty}}" autocomplete="off" size="2">

                        </div>
                    </td>

                    </td>
                    <td>
                        <p class="cart_total_price"><b>{{number_format($value->price * $value->qty)}} <sup>đ</sup></b>
                        </p>
                    </td>
                    <td>
                        <a class="cart_quantity_delete"
                            href="{{URL::to('/user/cart/delete-to-cart/'.$value->rowId)}}"><i
                                class="fa fa-times"></i></a>
                    </td>
                </tr>

                @endforeach

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Tạm tính</td>
                    <td>
                        <h4 class="cart_total_price">{{Cart::subtotal()}} <sup>đ</sup></h4>
                    </td>
                </tr>

            </tbody>
        </table>
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
    </div>

</section>
<!--/#cart_items-->