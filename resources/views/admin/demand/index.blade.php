@extends('admin.component.master')
@section('css')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('css/admin/all.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-colorpicker.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-timepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('css/admin/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/pace.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-timepicker.min.css') }}">
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin người dùng</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="{{ route('demand.postAdd') }}">
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tên người dùng</label>
                                <div class="col-sm-10">
                                    <input type="text" name="client_name" class="form-control" id="inputEmail3"
                                           placeholder="">

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vendor_phone1" class="col-sm-2 control-label">Số điện thoại chính</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="client_phone" id="vendor_phone1"
                                           value="{{ $phone }}"
                                           placeholder="số điện thoại chính">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vendor_phone2" class="col-sm-2 control-label">Số điện thoại phụ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="client_phone2" id="client_phone2"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vendor_email" class="col-sm-2 control-label">Email người dùng</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="user_email" name="email"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="official_address" class="col-sm-2 control-label">Ưu tiên liên lạc</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="official_address" name="contact_method">
                                        <option value="1">Gọi điện</option>
                                        <option value="2">Gửi mail</option>
                                        <option value="3">Cả hai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="official_region" class="col-sm-2 control-label">Địa điểm : </label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="prefecture" class="col-sm-2 control-label">Tỉnh</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" data-placeholder="Chọn các việc làm"
                                                    id="province_id" name="province_id" style="width: 100%;">
                                                @foreach($provinces as $province)
                                                    <option value="{{ $province->id }}">{{ $province->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="district" class="col-sm-2 control-label">Huyện</label>
                                        <div class="col-sm-10">
                                            <select class="form-control district select2" id="district"
                                                    name="district_id">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-sm-2 control-label">Xã</label>
                                        <div class="col-sm-10">
                                            <select class="form-control prefecture select2" id="district"
                                                    name="prefecture_id">
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
                                                       name="config_time">Thời
                                                gian chỉ định
                                            </label>
                                            <label class="col-md-6">
                                                <input type="radio" value="2" id="config_time2" name="config_time">Khoảng
                                                thời gian có thể
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label class="col-md-3">
                                                <input type="text" id="specify_time" name="specify_time"
                                                       class="form-control">
                                            </label>
                                            <label class="col-md-2"></label>
                                            <label class="col-md-6">
                                                <input type="text" id="config_datetime" disabled name="config_datetime"
                                                       class="form-control">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default">Hủy</button>
                            <button type="submit" class="btn btn-info pull-right">Lưu</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('script')

    <!-- Select2 -->
    <script src="{{ asset('js/admin/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('js/admin/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.inputmask.date.extensions.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.inputmask.extensions.js') }}"></script>
    <!-- date-range-picker -->
    <!-- bootstrap color picker -->
    <script src="{{ asset('js/admin/bootstrap-colorpicker.min.js') }}"></script>
    <!-- bootstrap time picker -->
    <script src="{{ asset('js/admin/bootstrap-timepicker.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('js/admin/jquery.slimscroll.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('js/admin/icheck.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/admin/fastclick.js') }}"></script>
    <script src="{{ asset('js/admin/pace.min.js') }}"></script>
    <!-- Page script -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();
            if(dd<10){ dd='0'+dd }
            if(mm<10){ mm='0'+mm }
            var today = dd+'/'+mm+'/'+yyyy;
            //Date range picker
            $('#config_datetime').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY'
                },
                minDate:today
            });

            //Date picker
            $('#specify_time').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
                startDate: '+0d'
            });
            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            })
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            })

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url_district = '{{ route('demand.getDistrict') }}';
            var province = $('#province_id').val();
            Pace.restart();
            Pace.track(function () {
                $.ajax({
                    type: "POST",
                    url: url_district,
                    data: {
                        province_id: province
                    },
                    success: function (response) {
                        $('.district').html(response);
                        var district = $('.district').val();
                        var url_prefecture = '{{ route('demand.getPrefecture') }}';

                        $.ajax({
                            type: "POST",
                            url: url_prefecture,
                            data: {
                                district_id: district
                            },
                            success: function (response) {
                                $('.prefecture').html(response);
                            },
                            failure: function (response) {
                            },
                            error: function (response) {
                            }
                        });
                    },
                    failure: function (response) {
                    },
                    error: function (response) {
                    }
                });
            });
            $('#province_id').on('change', function () {
                var province = $(this).val();
                Pace.restart();
                Pace.track(function () {
                    $.ajax({
                        type: "POST",
                        url: url_district,
                        data: {
                            province_id: province
                        },
                        success: function (response) {
                            $('.district').html(response);
                            var district = $('.district').val();
                            var url_prefecture = '{{ route('demand.getPrefecture') }}';
                            $.ajax({
                                type: "POST",
                                url: url_prefecture,
                                data: {
                                    district_id: district
                                },
                                success: function (response) {
                                    $('.prefecture').html(response);
                                },
                                failure: function (response) {
                                },
                                error: function (response) {
                                }
                            });
                        },
                        failure: function (response) {
                        },
                        error: function (response) {
                        }
                    });
                });
            });
            $('#district').on('change', function () {
                var district = $(this).val();
                var url_prefecture = '{{ route('demand.getPrefecture') }}';
                Pace.restart();
                Pace.track(function () {
                    $.ajax({
                        type: "POST",
                        url: url_prefecture,
                        data: {
                            district_id: district
                        },
                        success: function (response) {
                            $('.prefecture').html(response);
                        },
                        failure: function (response) {
                        },
                        error: function (response) {
                        }
                    });
                });
            });
            $('#config_time1').on('click', function () {
                $("#specify_time").prop('disabled', false);
                $("#config_datetime").prop('disabled', true);
            });
            $('#config_time2').on('click', function () {
                $("#specify_time").prop('disabled', true);
                $("#config_datetime").prop('disabled', false);
            })
        })
        ;
    </script>
@endsection