<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>form-v1 by Colorlib</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="adminlte/plugins/jquery-ui/jquery-ui.css">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="eshopper/css/opensans-font.css">
    <link rel="stylesheet" type="text/css"
        href="eshopper/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="eshopper/css/main.css" />
</head>

<body>
    <div class="page-content">
        <div class="form-v1-content">
            <div class="wizard-form">
                <form class="form-register" action="#" method="post">
                    <div id="form-total">
                        <!-- SECTION 1 -->
                        <h2>
                            <p class="step-icon"><span>01</span></p>
                            <span class="step-text">Thông tin cá nhân</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <div class="wizard-header">
                                    <h3 class="heading">Thông tin cá nhân</h3>
                                    <p>Vui lòng nhập thông tin của bạn và tiến hành bước tiếp theo để chúng tôi có thể
                                        tạo tài khoản của bạn. </p>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <fieldset>
                                            <legend>Họ và tên <span class="must font-weight-bold">(*)</span>
                                            </legend>
                                            <input type="text" class="form-control" id="user-name" name="user-name"
                                                placeholder="Nhập họ và tên của bạn" required>
                                        </fieldset>
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-gender">
                                        <label class="label col-md-12">Giới tính <span
                                                class="must font-weight-bold">(*)</span>
                                        </label>
                                        <div class="row">

                                            <div class="form-check col-md-3">
                                                <input type="radio" class="form-check-input" id="radio1" name="gender"
                                                    value="Nam">
                                                <label class="form-check-label" for="radio1">Nam</label>
                                            </div>
                                            <div class="form-check  col-md-3">
                                                <input type="radio" class="form-check-input" id="radio2" name="gender"
                                                    value="Nữ">
                                                <label class="form-check-label" for="radio2"> Nữ</label>
                                            </div>
                                            <div class="form-check  col-md-3">
                                                <input type="radio" class="form-check-input" name='gender' value="Khác">
                                                <label class="form-check-label">Khác</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-row form-row-date">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend class="special-label">Ngày sinh <span
                                                    class="must font-weight-bold">(*)</span></legend>
                                            <input type="text" class="form-control" id="birthday" name="birthday"
                                                required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder row">
                                        <div class="form-select col-md-3">
                                            <label class="form-control-label" for="province">Tỉnh/ Thành</label>
                                            <select name="province" id="province"></select>

                                        </div>
                                        <div class="form-select col-md-3">
                                            <label class="form-control-label" for="district">Quận/Huyện</label>
                                            <select name="district" id="district"></select>

                                        </div>
                                        <div class="form-select col-md-3">
                                            <label class="form-control-label" for="ward">Phường/Xã</label>
                                            <select name="ward" id="ward"></select>

                                        </div>
                                    </div>


                                </div>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <fieldset>
                                            <legend>Địa chỉ cụ thể <span class="must font-weight-bold">(*)</span>
                                            </legend>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Nhập địa chỉ cụ thể" required>
                                        </fieldset>
                                    </div>

                                </div>

                            </div>
                        </section>
                        <!-- SECTION 2 -->
                        <h2>
                            <p class="step-icon"><span>02</span></p>
                            <span class="step-text">Thông tin đăng nhập</span>
                        </h2>
                        <section>
                            <div class="inner">

                                <div class="wizard-header">
                                    <h3 class="heading">Thông tin đăng nhập</h3>
                                    <p>Vui lòng nhập thông tin của bạn và tiến hành bước tiếp theo để chúng tôi có thể
                                        tạo tài khoản của bạn.</p>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend> Email <span class="must font-weight-bold">(*)</span></legend>
                                            <input type="text" name="your_email" id="your_email" class="form-control"
                                                pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="abc@email.com"
                                                required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Số điện thoại <span class="must font-weight-bold">(*)</span>
                                            </legend>
                                            <input type="text" class="form-control" id="phone" name="phone" required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Mật khẩu <span class="must font-weight-bold">(*)</span>
                                            </legend>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <fieldset>
                                            <legend>Xác nhận mật khẩu <span class="must font-weight-bold">(*)</span>
                                            </legend>
                                            <input type="password" class="form-control" id="cf_password"
                                                name="cf_password" required>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- SECTION 3 -->
                        <h2>
                            <p class="step-icon"><span>03</span></p>
                            <span class="step-text">Lĩnh vực quan tâm</span>
                        </h2>
                        <section>
                            <div class="inner">
                                <div class="wizard-header">
                                    <h3 class="heading">Lĩnh vực quan tâm</h3>
                                    <p>Vui lòng nhập thông tin của bạn và tiến hành bước tiếp theo để chúng tôi có thể
                                        tạo tài khoản của bạn.</p>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <input type="radio" class="radio" name="radio1" id="plan-1" value="plan-1">
                                        <label class="plan-icon plan-1-label" for="plan-1">
                                            <img src="images/form-v1-icon-2.png" alt="pay-1">
                                        </label>
                                        <div class="plan-total">
                                            <span class="plan-title">Specific Plan</span>
                                            <p class="plan-text">Pellentesque nec nam aliquam sem et volutpat consequat
                                                mauris nunc congue nisi.</p>
                                        </div>
                                        <input type="radio" class="radio" name="radio1" id="plan-2" value="plan-2">
                                        <label class="plan-icon plan-2-label" for="plan-2">
                                            <img src="images/form-v1-icon-2.png" alt="pay-1">
                                        </label>
                                        <div class="plan-total">
                                            <span class="plan-title">Medium Plan</span>
                                            <p class="plan-text">Pellentesque nec nam aliquam sem et volutpat consequat
                                                mauris nunc congue nisi.</p>
                                        </div>
                                        <input type="radio" class="radio" name="radio1" id="plan-3" value="plan-3"
                                            checked>
                                        <label class="plan-icon plan-3-label" for="plan-3">
                                            <img src="images/form-v1-icon-3.png" alt="pay-2">
                                        </label>
                                        <div class="plan-total">
                                            <span class="plan-title">Special Plan</span>
                                            <p class="plan-text">Pellentesque nec nam aliquam sem et volutpat consequat
                                                mauris nunc congue nisi.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="eshopper/js/jquery-3.3.1.min.js"></script>
    <script src="eshopper/js/jquery.steps.js"></script>
    <script src="eshopper/js/main.js"></script>
    <script src="adminlte/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="adminlte/plugins/jquery-ui/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#birthday" ).datepicker({
                dateFormat: 'dd/mm/yy',
                changeMonth: true,
                 changeYear: true,
                 yearRange:"-50:-18" })
            });
          
    
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>