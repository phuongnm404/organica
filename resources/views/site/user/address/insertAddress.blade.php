<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="CreateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CreateModalLabel">Thêm địa chỉ giao hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-row">
                            <label>Họ và tên <span class="must font-weight-bold">(*)</span>
                            </label>
                            <input type="text" class="form-control" name="other_name"
                                placeholder="Nhập họ và tên người nhận" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row">
                            <label>Số điện thoại <span class="must font-weight-bold">(*)</span>
                            </label>
                            <input type="text" class="form-control" name="other_phone" required>
                        </div>
                    </div>
                    <div class="form-row row">

                        <div class="col-md-4">
                            <label for="province">Tỉnh/
                                Thành <span class="must font-weight-bold">(*)</span></label>
                            <select class="form-select" name="other_province_id" id="province_other_id" required>
                                @foreach ($province_list as $value)

                                <option value="{{$value->id}}">{{$value->province_name}}</option>

                                @endforeach


                            </select>

                        </div>
                        <div class="col-md-4">
                            <label for="district">Quận/Huyện <span class="must font-weight-bold">(*)</span></label>
                            <select class="form-select" name="other_district_id" id="district_other_id" required>
                                @foreach ($district->getDistrict($user_id_address[0]->district_id) as $value)

                                <option value="{{ $value->id }}">{{ $value->district_name }}</option>

                                @endforeach
                            </select>

                        </div>
                        <div class=" col-md-4">
                            <label for="ward">Phường/Xã <span class="must font-weight-bold">(*)</span></label>
                            <select class="form-select" name="other_ward_id" id="ward_other_id" required>
                                @foreach ($ward->getWard($user_id_address[0]->ward_id) as $value)

                                <option value="{{ $value->id }}">{{ $value->ward_name }}</option>

                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row">
                            <label>Địa chỉ cụ thể <span class="must font-weight-bold">(*)</span>
                            </label>
                            <input type="text" class="form-control" name="other_address_detail" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Thêm địa chỉ mới</button>
                </div>
            </form>

        </div>
    </div>
</div>