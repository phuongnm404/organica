<div class="col-md-12 form-information">
    <h3> ĐỊA CHỈ GIAO HÀNG </h3>
    <form action="{{route('user.infor.updatePass', ['id'=>$user->id])}}" method="post">
        @csrf
        <div class="form-row">
            <label>Địa chỉ giao hàng hiện tại</span>
            </label>
            <ul>
                <li>

                </li>
            </ul>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Địa chỉ giao hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Mặc định</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address.', '.$ward->getWardName($user->ward_id).', '.
                            $district->getDistrictName($user->district_id).',
                            '.$provinceModel->getProvinceName($user->province_id)}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-row">
            <label>Bạn muốn giao hàng đến địa chỉ khác? <a data-toggle="modal" data-target="#exampleModal">
                    Thêm địa chỉ giao
                    hàng
                </a></span>
            </label>

        </div>

    </form>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm địa chỉ giao hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-row">
                            <label>Họ và tên <span class="must font-weight-bold">(*)</span>
                            </label>
                            <input type="text" class="form-control" id="user-name" name="name"
                                placeholder="Nhập họ và tên người nhận" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row">
                            <label>Số điện thoại <span class="must font-weight-bold">(*)</span>
                            </label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                    <div class="form-row row">

                        <div class="col-md-4">
                            <label for="province">Tỉnh/
                                Thành <span class="must font-weight-bold">(*)</span></label>
                            <select class="form-select" name="province_id" id="province_other_id" required>
                                @foreach ($province_list as $value)
                                @if ($value->id == $user->province_id)
                                <option value="{{ $value->id }}" selected>{{ $value->province_name }}</option>
                                @else
                                <option value="{{$value->id}}">{{$value->province_name}}</option>
                                @endif
                                @endforeach


                            </select>

                        </div>
                        <div class="col-md-4">
                            <label for="district">Quận/Huyện <span class="must font-weight-bold">(*)</span></label>
                            <select class="form-select" name="district_id" id="district_other_id" required>
                                @foreach ($district->getDistrict($user->district_id) as $value)
                                @if ($value->id == $user->district_id)
                                <option value="{{ $value->id }}" selected>{{ $value->district_name }}</option>
                                @else
                                <option value="{{ $value->id }}">{{ $value->district_name }}</option>
                                @endif
                                @endforeach
                            </select>

                        </div>
                        <div class=" col-md-4">
                            <label for="ward">Phường/Xã <span class="must font-weight-bold">(*)</span></label>
                            <select class="form-select" name="ward_id" id="ward_other_id" required>
                                @foreach ($ward->getWard($user->ward_id) as $value)
                                @if ($value->id == $user->ward_id)
                                <option value="{{ $value->id }}" selected>{{ $value->ward_name }}</option>
                                @else
                                <option value="{{ $value->id }}">{{ $value->ward_name }}</option>
                                @endif
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row">
                            <label>Địa chỉ cụ thể <span class="must font-weight-bold">(*)</span>
                            </label>
                            <input type="text" class="form-control" id="address_detail" name="address_detail" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    $(document).ready(function() {

    });
    function create() {
        $("#exampleModal").modal('show');
    }
</script>
<script>
    $( function() {
        
          jQuery(document).ready(function(){
            jQuery('#province_other_id').change(function(){
              let provinceId=jQuery(this).val();
              
              jQuery('#ward_other_id').html('<option value = "">--Chọn--</option>')

              jQuery.ajax({
                url:"{{route('site.address.district')}}",
                type:'post',
                data:'provinceId='+provinceId+'&_token={{csrf_token()}}',
                success:function(result){
                   jQuery('#district_other_id').html(result)
                }
              });
            });     
            jQuery('#district_other_id').change(function(){
              let districtId=jQuery(this).val();
              jQuery.ajax({
                url:"{{route('site.address.ward')}}",
                type:'post',
                data:'districtId='+districtId+'&_token={{csrf_token()}}',
                success:function(result){
                  jQuery('#ward_other_id').html(result)
                }
              });
			      });
		      });
    });
</script>
@endsection