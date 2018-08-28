<div class="form-group">
    <label for="" class="col-sm-2 control-label">Tỉnh/Thành phố</label>
    <div class="col-sm-10">
        <select class="form-control select2" id="province_extra_id"  style="width: 100%">
            @foreach($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->title }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="" class="col-sm-2 control-label">Quận/Huyện</label>
    <div class="col-sm-10">
        <select id="district_extra_id" class="form-control district_extra select2"  style="width: 100%"></select>
    </div>
</div>
<div class="form-group">
    <label for="" class="col-sm-2 control-label">Xã/Phường</label>
    <div class="col-sm-10">
        <select id="prefecture_extra_id" class="form-control prefecture_extra select2"  style="width: 100%"></select>
    </div>
</div>
<div class="form-group">
    <label for="" class="col-sm-2 control-label">Địa chỉ</label>
    <div class="col-sm-10">
        <input type="text" id="address_extra" class="form-control"  style="width: 100%">
    </div>
</div>
<div class="form-group">
    <label for="" class="col-sm-2 control-label">Số điện thoại phụ</label>
    <div class="col-sm-10">
        <input type="text" id="phone_extra_number" class="form-control"  style="width: 100%">
    </div>
</div>