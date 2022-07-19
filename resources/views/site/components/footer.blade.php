<footer id="footer">
    <!--Footer-->
    @include('site.components.banner_footer')
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="single-widget">
                        <h2>trang chủ</h2>
                        <h2>Sản phẩm</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Rau củ quả</a></li>
                            <li><a href="#">Trai cây</a></li>
                            <li><a href="#">Thức uống</a></li>
                        </ul>
                        <h2>Hỗ trợ khách hàng</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Chính sách giao hàng </a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Chính sách hoàn tiền</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-widget">
                        <h2>Trò chuyện cùng Organica</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Hiểu hữu cơ</a></li>
                            <li><a href="#">Ăn hữu cơ</a></li>
                            <li><a href="#">Sống hữu cơ</a></li>
                            <li><a href="#">Mẹ hữu cơ</a></li>
                            <li><a href="#">Organica Blog</a></li>
                        </ul>
                        <h2>Về Organica</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Giới thiệu</a></li>
                            <li><a href="#">Tầm nhìn& Sứ mệnh</a></li>
                            <li><a href="#">Trang trại hữu cơ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-widget">
                        <h2>Đăng ký nhận khuyến mại</h2>
                        <form action="#" class="searchform">
                            <textarea name="message" id="" cols="30" rows="10"
                                placeholder="Góp ý của bạn về trang web"></textarea>
                            {{-- <input type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}"> --}}
                            <input type="hidden" name="cart_id" id="cart_id" value="0">
                            <p class="pull-left"><button id="request" class="btn btn-success">Gửi ý kiến</button>
                            </p>

                        </form>
                        <p>
                        <h3> CỬA HÀNG TẠI TP.HỒ CHÍ MINH</h3>
                        <ol>
                            <li> 130 Nguyễn Đình Chiểu, Phường Võ Thị Sáu, Quận 3, TP.Hồ Chí Minh- Tel: 028 6673 3350 |
                                0902
                                686 292</li>
                            <li> 54 Hoàng Văn Thụ, Phường 9, Quận Phú Nhuận, TP.Hồ Chí Minh- Tel: 028 6685 0532 | 0901
                                81 81
                                84</li>
                            <li> 24 Nguyễn Quý Đức, Phường An Phú, TP.Thủ Đức, TP.Hồ Chí Minh- Tel: 028 2212 6326 | 0838
                                153
                                535</li>
                            <li>60 Nguyễn Đức Cảnh, Phường Tân Phong, Quận 7, TP.Hồ Chí Minh- Tel: 028 5413 5235 | 0886
                                776
                                116</li>
                            <li> Căn SH03, tòa nhà Aqua 2, Vinhomes Golden River, 02 Nguyễn Hữu Cảnh, Phường Bến Nghé,
                                Quận
                                1,, TP.Hồ Chí Minh- Tel: 028 2229 2535 I 088 990 3535</li>
                        </ol>






                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="">PhuongNM</a></span></p>
            </div>
        </div>
    </div>
</footer>
<!--/Footer-->