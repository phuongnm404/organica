<section id="cart_items">
    <div class="container">
        <div class="table-responsive cart_info">
            @php
            $content = Cart::content();
            @endphp
            @if(isset($content) && count($content)>0)
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Ảnh</td>
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng giá</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $value)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{ URL::to($value->options->image)}}" alt="" style="width: 100px;"></a>
                        </td>
                        <td class="cart_description">
                            <h4><b><a href="">{{$value->name}}</a></b> </h4>

                        </td>
                        <td class="cart_price">
                            <p>{{number_format($value->price)}} <sup>đ</sup></p>
                        </td>

                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$value->qty}}"
                                    autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>

                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{number_format($value->price * $value->qty)}} <sup>đ</sup></p>
                        </td>
                        <td class="">
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
                            <h3 class="cart_total_price">{{Cart::subtotal()}} <sup>đ</sup></h3>
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
    </div>
</section>
<!--/#cart_items-->