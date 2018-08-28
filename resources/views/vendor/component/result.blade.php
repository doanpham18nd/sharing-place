<label for="official_region" class="col-sm-2 control-label">Chi nhánh phụ: </label>
<div class="col-sm-10">
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Tỉnh/Thành phố</label>
        <div class="col-sm-10">
            <select class="form-control select2" name="province_extra_id[]" readonly
                    style="width: 100%">
                <option value="{{$data['province_extra_id']}}" selected >{{ $province_selected->title }}</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Quận/Huyện</label>
        <div class="col-sm-10">
            <select name="district_extra_id[]" class="form-control select2"
                    readonly style="width: 100%">
                <option value="{{ $data['district_extra_id'] }}" selected>{{ $district_selected->title }}</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Xã/Phường</label>
        <div class="col-sm-10">
            <select name="prefecture_extra_id[]" class="form-control select2"
                    readonly style="width: 100%">
                <option value="{{ $data['prefecture_extra_id'] }}" selected>{{ $prefecture_selected->name }}</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Địa chỉ</label>
        <div class="col-sm-10">
            <input type="text" name="address_extra[]" value="{{ $data['address_extra'] }}"
                   class="form-control" readonly style="width: 100%">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-sm-2 control-label">Số điện thoại phụ</label>
        <div class="col-sm-10">
            <input type="text" name="phone_extra_number[]" class="form-control"
                   value="{{ $data['phone_extra_number'] }}" readonly style="width: 100%">
        </div>
    </div>
</div>
<br>