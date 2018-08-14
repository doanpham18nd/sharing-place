@extends('admin.component.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/pace.min.css') }}">
@endsection
@section('content')
    <section class="content">
        <div class="row">
            @if(session()->has('success'))
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                </div>
        @endif
        <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin công ty</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="{{route('vendor.postAdd')}}">
                        <div class="box-body">
                            <div class="form-group">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <input type="hidden" value="{{csrf_token()}}" name="_token">
                                <label for="username" class="col-sm-2 control-label">User name</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="username" name="user_name"
                                           placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Tên công ty</label>
                                <div class="col-sm-10">
                                    <input type="text" name="vendor_name" class="form-control" id="inputEmail3"
                                           placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vendor_phone1" class="col-sm-2 control-label">Số điện thoại chính</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="vendor_phone1" name="vendor_phone"
                                           placeholder="số điện thoại chính">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vendor_phone2" class="col-sm-2 control-label">Số điện thoại phụ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="vendor_phone2" name="vendor_phone2"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vendor_email" class="col-sm-2 control-label">Email công ty</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="vendor_email" name="vendor_email"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vendor_web" class="col-sm-2 control-label">Trang web công ty</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="vendor_web" name="vendor_web"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vendor_web" class="col-sm-2 control-label">Số tài khoản công ty</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="vendor_bank" id="vendor_bank"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vendor_web" class="col-sm-2 control-label">Số tiền được nạp vào hệ
                                    thống</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="price_total" id="price_total"
                                           placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="official_region" class="col-sm-2 control-label">Trụ sở chính công
                                    ty: </label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="prefecture" class="col-sm-2 control-label">Tỉnh/Thành phố</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" id="province_id" name="province_id">
                                                @foreach($provinces as $province)
                                                    <option value="{{ $province->id }}">{{ $province->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="district" class="col-sm-2 control-label">Quận/Huyện</label>
                                        <div class="col-sm-10">
                                            <select class="form-control district select2" id="district"
                                                    name="district_id">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="commune" class="col-sm-2 control-label">Xã/Phường</label>
                                        <div class="col-sm-10">
                                            <select class="form-control prefecture select2" id="prefecture"
                                                    name="prefecture_id">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="col-sm-2 control-label">Địa chỉ</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="address" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group extra_branch">
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-2 control-label">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" id="add_extra"
                                            data-target="#modal-default">
                                        Thêm chi nhánh phụ
                                    </button>
                                </label>
                            </div>
                        </div>
                        <div class="modal fade bd-example-modal-lg" id="modal-default" tabindex="-1" role="dialog"
                             aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Thêm mới chi nhánh phụ</h4>
                                    </div>
                                    <div class="modal-body">
                                        @include('admin.vendor.component.extra-branch')
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                                            Đóng
                                        </button>
                                        <button type="button" id="add_extra_branch" class="btn btn-primary">Thêm mới
                                        </button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default">Hủy bỏ</button>
                            <button type="submit" class="btn btn-info pull-right">Đăng ký</button>
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
    <!-- SlimScroll -->
    <script src="{{ asset('js/admin/jquery.slimscroll.min.js') }}"></script>
    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('js/admin/icheck.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/admin/fastclick.js') }}"></script>
    <script src="{{ asset('js/admin/pace.min.js') }}"></script>
    <!-- Page script -->
    <script>
        (function () {
            //Initialize Select2 Elements
            $('.select2').select2();
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

            //add extra branch on modal
            $('#add_extra_branch').on('click', function () {
                var url_add_extra = '{{ route('vendor.addExtraVendorInfo') }}';
                var province_extra_id = $('#province_extra_id').val();
                var district_extra_id = $('#district_extra_id').val();
                var prefecture_extra_id = $('#prefecture_extra_id').val();
                var address_extra = $('#address_extra').val();
                var phone_extra_number = $('#phone_extra_number').val();
                Pace.track(function () {
                    $.ajax({
                        type: "POST",
                        url: url_add_extra,
                        data: {
                            province_extra_id: province_extra_id,
                            district_extra_id: district_extra_id,
                            prefecture_extra_id: prefecture_extra_id,
                            address_extra: address_extra,
                            phone_extra_number: phone_extra_number
                        },
                        success: function (response) {
                            $('.extra_branch').append(response);
                            $('.modal').modal('toggle');
                        },
                        failure: function (response) {
                        },
                        error: function (response) {
                        }
                    });
                });
            })
            //get extra
            var province_extra = $('#province_extra_id').val();
            Pace.restart();
            Pace.track(function () {
                $.ajax({
                    type: "POST",
                    url: url_district,
                    data: {
                        province_id: province_extra
                    },
                    success: function (response) {
                        $('.district_extra').html(response);
                        var district = $('.district_extra').val();
                        var url_prefecture = '{{ route('demand.getPrefecture') }}';

                        $.ajax({
                            type: "POST",
                            url: url_prefecture,
                            data: {
                                district_id: district
                            },
                            success: function (response) {
                                $('.prefecture_extra').html(response);
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
            $('#province_extra_id').on('change', function () {
                var province_extra = $(this).val();
                Pace.restart();
                Pace.track(function () {
                    $.ajax({
                        type: "POST",
                        url: url_district,
                        data: {
                            province_id: province_extra
                        },
                        success: function (response) {
                            $('.district_extra').html(response);
                            var district = $('.district_extra').val();
                            var url_prefecture = '{{ route('demand.getPrefecture') }}';

                            $.ajax({
                                type: "POST",
                                url: url_prefecture,
                                data: {
                                    district_id: district
                                },
                                success: function (response) {
                                    $('.prefecture_extra').html(response);
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
            $('#district_extra_id').on('change', function () {
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
                            $('.prefecture_extra').html(response);
                        },
                        failure: function (response) {
                        },
                        error: function (response) {
                        }
                    });
                });
            });
        })()
    </script>
@endsection