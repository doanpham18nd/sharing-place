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
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin hợp đồng</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="{{ route('bill.getAdd', $demand->id) }}">
                        <div class="box-body">
                            <div class="form-group">
                                <h2 class="red-text text-center font-weight-bold">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT
                                    NAM</h2>
                                <h3 class="red-text text-center">Độc lập – Tự do – Hạnh phúc</h3>
                                <h3 class="red-text text-center font-weight-bold">-----------------------------</h3>
                                <h3 class="red-text text-center font-weight-bold">HỢP ĐỒNG SỬA CHỮA CHUYÊN DỤNG</h3>
                                <h4 class="text-center">Mã số hợp đồng : {{ $demand->id }}/HĐMB</h4>
                            </div>
                            <br>
                            <div class="col-md-6">
                                <div class="box-header with-border">
                                    <h3 class="box-title font-weight-bold" style="font-weight: bold">THÔNG TIN NGƯỜI
                                        DÙNG</h3>
                                </div>
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td>Tên khách hàng :</td>
                                        <td>{{ $demand->client->user_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại :</td>
                                        <td>{{ $demand->client->user_phone1 }}</td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ :</td>
                                        <td>{{ $demand->client->address }}
                                            -{{ $demand->client->prefecture->title }}
                                            -{{ $demand->client->province->title }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <div class="box-header with-border">
                                    <h3 class="box-title font-weight-bold" style="font-weight: bold">THÔNG TIN DOANH
                                        NGHIỆP</h3>
                                </div>
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <td>Tên công ty :</td>
                                        <td><select class="form-control select2" name="vendor_id"
                                                    data-placeholder="Chọn các việc làm">
                                                @foreach($vendors as $vendor)
                                                    <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option>
                                                @endforeach
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td>July</td>
                                        <td>Dooley</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <label for="vendor_phone2" class="col-sm-2 control-label">Danh sách việc cần
                                        làm</label>
                                    <div class="col-sm-10">
                                        <label class="control-label">
                                            @php
                                                $demandName = '';
                                                $demandPriceTotal = 0;
                                                    foreach ($demand->demandDetails as $demandDetail) {
                                                    $demandName .= '-' . $demandDetail->job->job_name;
                                                    $demandPriceTotal += $demandDetail->job->job_price;
                                                    }
                                            @endphp
                                            {{ $demandName }}
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="vendor_phone2" class="col-sm-2 control-label">Tổng tiền</label>
                                    <div class="col-sm-10">
                                        <label class="control-label">{{ number_format($demandPriceTotal) }} VNĐ</label>
                                        <input type="hidden" name="total_price" value="{{ $demandPriceTotal }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="vendor_email" class="col-sm-2 control-label">Công ty đảm nhiệm</label>
                                    <div class="col-sm-10">
                                        <select class="form-control select2" name="vendor_id"
                                                data-placeholder="Chọn các việc làm">
                                            @foreach($vendors as $vendor)
                                                <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="official_address" class="col-sm-2 control-label">Người tạo hợp
                                        đồng</label>
                                    <div class="col-sm-10">
                                        <label class="control-label">Admin</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="official_address" class="col-sm-2 control-label">Ngày tạo hợp
                                        đồng</label>
                                    <div class="col-sm-10">
                                        <label class="control-label">{{ date_format($demand->created_at, 'd/m/Y - H:i') }}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="working_time" class="col-sm-2 control-label">Thời gian đảm nhận</label>
                                    <div class="col-sm-10">
                                        <label class="control-label">
                                            @if($demand->specify_time == 1)
                                                {{ $demand->specify_datetime }}
                                            @else
                                                {{ $demand->config_datetime1}} ~ {{ $demand->config_datetime2 }}
                                            @endif
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="working_time" class="col-sm-2 control-label">Trạng thái hợp đồng</label>
                                    <div class="col-sm-10">
                                        <label class="control-label">Chưa được xác nhận</label>
                                        <input type="hidden" value="0" name="agreement_status">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="box-header with-border">
                                    <h3 class="box-title font-weight-bold" style="font-weight: bold">CHI TIẾT CÔNG VIỆC</h3>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10%">STT</th>
                                        <th style="width: 35%">Tên việc</th>
                                        <th style="width: 25%">Chi phí phát sinh</th>
                                        <th style="width: 25%">Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $demandPriceTotal = 0;
                                        $stt = 0;
                                    @endphp
                                    @foreach($demand->demandDetails as $demandDetail)
                                        @php
                                            $stt++;
                                            $demandPriceTotal += $demandDetail->job->job_price;
                                        @endphp
                                        <tr>
                                            <td>{{ $stt }}</td>
                                            <td>{{ $demandDetail->job->job_name }}</td>
                                            <td>Không</td>
                                            <td>{{ number_format($demandDetail->job->job_price) }} VNĐ</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2"></td>
                                        <td><span style="float: right;">Tổng tiền</span></td>
                                        <td>{{ number_format($demandPriceTotal) }} VNĐ</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-default">Hủy</button>
                            <button type="submit" class="btn btn-info pull-right">Gửi</button>
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
    <!-- Page script -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                format: 'MM/DD/YYYY h:mm A'
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })

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
            })
        })
    </script>
@endsection