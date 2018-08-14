<div class="form-group">
    <label for="official_region" class="col-sm-2 control-label">Địa điểm : </label>
    <div class="col-sm-10">
        <div class="form-group">
            <label for="prefecture" class="col-sm-2 control-label">Tỉnh</label>
            <div class="col-sm-10">
                <select class="form-control select2" data-placeholder="Chọn các việc làm"
                        id="province_id" name="province_id[]" style="width: 100%;">
                    @foreach($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="district" class="col-sm-2 control-label">Huyện</label>
            <div class="col-sm-10">
                <select class="form-control district select2" id="district_id"
                        name="district_id[]">
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Xã</label>
            <div class="col-sm-10">
                <select class="form-control prefecture select2" id="prefecture_id"
                        name="prefecture_id[]">
                </select>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="" class="col-sm-2 control-label">Nhu cầu</label>
    <div class="col-sm-10">
        <select class="form-control select2" multiple="multiple"
                data-placeholder="Chọn các việc làm"
                name="job_id[]" style="width: 100%;">
            @foreach($jobs as $job)
                <option value="{{ $job->id }}">{{ $job->job_name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Thời gian mong muốn</label>
    <div class="col-sm-10">
        <div class="form-group">
            <div class="radio" style="padding-left: 19px">
                <label class="col-md-5">
                    <input type="radio" value="1" id="config_time1" checked
                           name="config_time[]">Thời
                    gian chỉ định
                </label>
                <label class="col-md-6">
                    <input type="radio" value="2" id="config_time2" name="config_time[]">Khoảng
                    thời gian có thể
                </label>
            </div>
            <div class="checkbox">
                <label class="col-md-3">
                    <input type="text" id="specify_time" name="specify_time[]"
                           class="form-control">
                </label>
                <label class="col-md-2"></label>
                <label class="col-md-6">
                    <input type="text" id="config_datetime" disabled name="config_datetime[]"
                           class="form-control">
                </label>
            </div>
        </div>
    </div>
</div>