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
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>

    <section class="page-content">
        <div class="container">
            <div class="row ">
                <div class="col-md-6 offset-md-3 ">
                    <div class="card mt-5 mb-5">
                        <div class="card-header text-white" style="background: #3e4061">
                            <h5>Đăng ký tài khoản</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" class="register-form">
                                @csrf
                                <div class="form-section">
                                    <div class="form-row">
                                        <label>Họ và tên <span class="must font-weight-bold">(*)</span>
                                        </label>
                                        <input type="text" class="form-control" id="user-name" name="name"
                                            placeholder="Nhập họ và tên của bạn" required
                                            data-parsley-required-message="Vui lòng nhập thông tin"
                                            data-parsley-length="[10,40]"
                                            data-parsley-length-message="Vui lòng nhập tên có độ dài từ 10-40 ký tự">
                                    </div>
                                    <div class="form-row row">
                                        <div class="col-md-2">
                                            <label class="label">Giới tính <span
                                                    class="must font-weight-bold">(*)</span>
                                            </label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="radio" class="form-check-input ml-3" id="radio2" name="gender"
                                                value="Nam" required
                                                data-parsley-required-message="Vui lòng chọn giới tính">
                                            <label class="form-check-label" for="radio2"> Nam</label> &ensp; &ensp;
                                            <input type="radio" class="form-check-input" id="radio1" name="gender"
                                                value="Nữ">
                                            <label class="form-check-label" for="radio1">Nữ</label>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <label class="special-label">Ngày sinh <span
                                                class="must font-weight-bold">(*)</span></label>
                                        <input type="text" class="form-control" id="birthday" name="birthday" required
                                            data-parsley-required-message="Vui lòng chọn ngày sinh">

                                    </div>
                                    <div class="form-row row">

                                        <div class="col-md-3">
                                            <label class=" label" for="province">Tỉnh/
                                                Thành <span class="must font-weight-bold">(*)</span></label>
                                            <select class="form-select" name="province_id" id="province" required
                                                data-parsley-required-message="Vui lòng chọn tỉnh/thành của bạn">
                                                <option value="">---Chọn---</option>
                                                @foreach ($province_list as $value)
                                                <option value="{{$value->id}}">{{$value->province_name}}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                        <div class="col-md-3">
                                            <label class=" label" for="district">Quận/Huyện <span
                                                    class="must font-weight-bold">(*)</span></label>
                                            <select class="form-select" name="district_id" id="district" required
                                                data-parsley-required-message="Vui lòng chọn quận/huyện của bạn">
                                                <option value="">---Chọn---</option>
                                            </select>

                                        </div>
                                        <div class=" col-md-3">
                                            <label class="label" for="ward">Phường/Xã <span
                                                    class="must font-weight-bold">(*)</span></label>
                                            <select class="form-select" name="ward_id" id="ward" required
                                                data-parsley-required-message="Vui lòng chọn phường/xã của bạn">
                                                <option value="">---Chọn---</option>
                                            </select>

                                        </div>



                                    </div>
                                    <div class="form-row">
                                        <label>Địa chỉ cụ thể <span class="must font-weight-bold">(*)</span>
                                        </label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            placeholder="Số nhà, ngõ, đường" required
                                            data-parsley-required-message="Vui lòng nhập thông tin">
                                    </div>
                                </div>
                                <div class="form-section">
                                    <div class="form-row">
                                        <label> Email <span class="must font-weight-bold">(*)</span></label>
                                        <input type="text" name="email" id="email" class="form-control"
                                            pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="abc@email.com" required
                                            data-parsley-type='email'
                                            data-parsley-required-message="Vui lòng nhập thông tin"
                                            data-parsley-type-message="Vui lòng nhập đúng định dạng email">
                                    </div>
                                    <div class="form-row">
                                        <label>Số điện thoại <span class="must font-weight-bold">(*)</span>
                                        </label>
                                        <input type="text" class="form-control" id="phone" name="phone" required
                                            data-parsley-type="number"
                                            data-parsley-type-message="Vui lòng nhập đúng định dạng số"
                                            data-parsley-required-message="Vui lòng nhập thông tin">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                            <label>Mật khẩu <span class="must font-weight-bold">(*)</span>
                                            </label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                data-parsley-length="[6,12]"
                                                data-parsley-length-message="Vui lòng nhập mật khẩu có độ dài từ 6 tới 12 ký tự"
                                                required data-parsley-required-message="Vui lòng nhập thông tin">
                                        </div>
                                        <div class="form-row">
                                            <label>Xác nhận mật khẩu <span class="must font-weight-bold">(*)</span>
                                            </label>
                                            <input type="password" class="form-control" id="cf_password"
                                                name="cf_password" required
                                                data-parsley-required-message="Vui lòng nhập thông tin"
                                                data-parsley-equalto="#password"
                                                data-parsley-equalto-message="Các mật khẩu đã nhập không trùng">
                                        </div>
                                    </div>


                                </div>
                                <div class="form-section">
                                    <label for="">Chọn lĩnh vực quan tâm <span class="must font-weight-bold">(*)</label>
                                    @foreach ($static as $staticItem)
                                    <br><input type="checkbox" name="static_feature[]" value="{{$staticItem->id}}"
                                        id="feature_user">{{$staticItem->name}}
                                    @endforeach

                                </div>
                                <p class="text-muted notice">Vui lòng nhập đầy đủ thông tin những phần có dấu (*)</p>
                                <div class="form-navigation">
                                    <button type="button" class="previous btn btn-success float-start"><i
                                            class="fas fa-angle-left">pre</i></button>
                                    <button type="button" class="next btn btn-success float-end"><i
                                            class="fas fa-angle-right">next</i></button>
                                    <button type="submit" class="btn btn-success float-right">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>







    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="eshopper/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
        integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script>
        $( function() {
            $( "#birthday" ).datepicker({
                dateFormat: 'dd/mm/yy',
                changeMonth: true,
                 changeYear: true,
                 yearRange:"-50:-18" })
            });
        jQuery(document).ready(function(){
			jQuery('#province').change(function(){
				let provinceId=jQuery(this).val();
                jQuery('#ward').html('<option value = "">--Chọn--</option>')
				jQuery.ajax({
					url:'/getDistrict',
					type:'post',
					data:'provinceId='+provinceId+'&_token={{csrf_token()}}',
					success:function(result){
						jQuery('#district').html(result)
					}
				});
			});
            jQuery('#district').change(function(){
				let districtId=jQuery(this).val();
				jQuery.ajax({
					url:'/getWard',
					type:'post',
					data:'districtId='+districtId+'&_token={{csrf_token()}}',
					success:function(result){
						jQuery('#ward').html(result)
					}
				});
			});
		});


    $(function () {
        var $sections = $('.form-section');
        function navigateTo(index) {
            $sections.removeClass("current").eq(index).addClass("current");
            $('.form-navigation .previous').toggle(index>0);
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [type=submit]').toggle(atTheEnd);
        }
        function curIndex() {
            return $sections.index($sections.filter('.current'));
        }
        $('.form-navigation .previous ').click(function (){
            navigateTo(curIndex()-1);
        });

        $('.form-navigation .next').click(function (){
            $('.register-form').parsley().whenValidate({
                    group: 'block-' + curIndex(),
                }).done(function () {
                    navigateTo(curIndex()+1);
                });
            
        });
    
        $sections.each(function(index,section){
            $(section).find(':input').attr('data-parsley-group','block-' + index);
            
        });
    
        navigateTo(0);
    });
    </script>
</body>

</html>