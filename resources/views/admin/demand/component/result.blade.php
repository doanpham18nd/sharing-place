<div class="form-group">
    <label for="official_region" class="col-sm-2 control-label">Địa điểm : </label>
    <div class="col-sm-10">
        <div class="form-group">
            <label for="prefecture" class="col-sm-2 control-label">Tỉnh</label>
            <div class="col-sm-10">
                <select class="form-control select2" data-placeholder="Chọn các việc làm" readonly
                        id="province_id2" name="province_id[]" style="width: 100%;">
                    <option value="{{ $province_selected->id }}">{{ $province_selected->title }}</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="district" class="col-sm-2 control-label">Huyện</label>
            <div class="col-sm-10">
                <select class="form-control district-extra2 select2" id="district_id2" readonly
                        name="district_id[]" style="width: 100%;">
                    <option value="{{ $district_selected->id }}">
                        {{ $district_selected->title }}
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Xã</label>
            <div class="col-sm-10">
                <select class="form-control prefecture-extra2 select2" id="prefecture_id2" readonly
                        name="prefecture_id[]" style="width: 100%;">
                    <option value="{{ $prefecture_selected->id }}">{{ $prefecture_selected->name }}</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Địa chỉ</label>
            <div class="col-sm-10">
                <input type="text" name="address[]" class="form-control" value="{{ $demands['address'] }}" readonly>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="" class="col-sm-2 control-label">Nhu cầu</label>
    <div class="col-sm-10">
        <select class="form-control select3" multiple="multiple"
                data-placeholder="Chọn các việc làm" id="set-style" readonly
                name="job_id[][]" style="width: 100%;">
            @foreach($jobs as $job)
                <option value="{{ $job->id }}" @if(in_array($job->id, $jobArray)) selected @endif>
                    {{ $job->job_name }}
                </option>
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
                    <input type="radio" value="1" id="config_time3" readonly
                           @if(isset($demands['config_time']) && $demands['config_time'] == 1) checked @else disabled @endif
                           name="config_time[]">Thời
                    gian chỉ định
                </label>
                <label class="col-md-6">
                    <input type="radio" value="2" id="config_time4" name="config_time[]" readonly
                           @if(isset($demands['config_time']) && $demands['config_time'] == 2) checked @else disabled @endif>
                    Khoảng thời gian có thể
                </label>
            </div>
            <div class="checkbox">
                <label class="col-md-3">
                    <input type="text" id="specify_time2" name="specify_time[]" readonly
                           value="@if(isset($demands['specify_time'])) {{ $demands['specify_time'] }} @endif"
                           class="form-control">
                </label>
                <label class="col-md-2"></label>
                <label class="col-md-6">
                    <input type="text" id="config_datetime2" name="config_datetime[]" readonly
                           value="@if(isset($demands['config_datetime'])) {{ $demands['config_datetime'] }} @endif"
                           class="form-control">
                </label>
            </div>
        </div>
    </div>
</div>