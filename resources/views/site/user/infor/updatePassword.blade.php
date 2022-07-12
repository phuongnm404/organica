<div class="col-md-6 form-information">
    <h3>THAY ĐỔI MẬT KHẨU</h3>
    <form action="{{route('user.infor.updatePass', ['id'=>$user->id])}}" method="post">
        @csrf
        <div class="form-row">
            <label>Mật khẩu hiện tại <span class="must font-weight-bold">(*)</span>
            </label>
            <input type="password" class="form-control" name="old_pass" required>
        </div>
        <div class="form-row">
            <label>Mật khẩu mới <span class="must font-weight-bold">(*)</span>
            </label>
            <input type="password" class="form-control" name="new_pass" required>
        </div>
        <div class="form-row">
            <button class="btn btn-sucess " style="background: green; float:right; color: white"> Lưu</button>
        </div>
    </form>

</div>