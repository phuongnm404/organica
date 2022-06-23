<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Đăng ký tài khoản</title>
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
                <div class="col-md-5 offset-md-3 ">
                    <div class="card mt-5 mb-5">
                        <div class="card-header text-white" style="background: #3e4061">
                            <h5 class="text-center">Đăng nhập</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-login">
                                <form action="">
                                    <div class="form-row">
                                        <label>Tên đăng nhập
                                        </label>
                                        <input type="text" class="form-control" id="user-name" name="name"
                                            placeholder="Email hoặc số điện thoại của bạn" required
                                            data-parsley-required-message="Vui lòng nhập thông tin"
                                            data-parsley-length="[10,40]"
                                            data-parsley-length-message="Vui lòng nhập tên có độ dài từ 10-40 ký tự">
                                    </div>
                                    <div class="form-row">
                                        <label>Mật khẩu
                                        </label>
                                        <input type="text" class="form-control" id="user-name" name="name"
                                            placeholder="Nhập mật khẩu" required
                                            data-parsley-required-message="Vui lòng nhập thông tin"
                                            data-parsley-length="[10,40]"
                                            data-parsley-length-message="Vui lòng nhập tên có độ dài từ 10-40 ký tự">
                                    </div>
                                    <button type="submit" class="btn btn-success">Đăng nhập</button>
                                </form>

                            </div>
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

</body>

</html>