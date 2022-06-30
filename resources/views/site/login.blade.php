<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Đăng nhập</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <label>Tên đăng nhập
                        </label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-row">
                        <label>Mật khẩu
                        </label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu"
                            required>
                    </div>
                    <div class="form-row row">
                        <div class="col-md-12">
                            <p><small><i>Chưa có tài khoản <a href="{{route('register')}}">Đăng ký</a></i></small></p>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                        </div>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success w-100 " style="float: right;">Đăng
                                nhập</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>