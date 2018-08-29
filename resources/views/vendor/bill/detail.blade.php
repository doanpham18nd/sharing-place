@extends('vendor.component.master')
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
@endsection
@section('content')
    <section class="content">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin hóa đơn</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post"
                          action="{{ route('company.bill.postDetail', $bill->id) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="demand_id" value="">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="box-body">
                            <div id="bill_print">
                                <div class="col-xs-12">
                                    <div class="form-group col-xs-4">
                                        <h2 class="red-text text-center"
                                            style="font-weight: 900 ; color: red">{{ mb_strtoupper($bill->vendor->vendor_name) }}</h2>
                                        <h4 class="red-text text-center font-weight-bold">
                                            -----------------------------</h4>
                                        <h4 class="red-text text-center font-weight-bold">ĐC
                                            : {{ $bill->vendor->address }}
                                            -
                                            {{ $bill->vendor->prefecture->name }} - {{ $bill->vendor->district->title }}
                                            - {{ $bill->vendor->province->title }}
                                        </h4>
                                        <h4 class="red-text text-center font-weight-bold">SĐT :
                                            0{{ $bill->vendor->vendor_phone }}
                                        </h4>
                                    </div>
                                    <div class="form-group col-xs-8">
                                        <h2 class="red-text text-center font-weight-bold" style="font-weight: 900 ;">HÓA
                                            ĐƠN
                                            SỬA CHỮA-BÁN LẺ</h2>
                                        <h4 class="red-text text-center">{{ date('\N\g\à\y...d') }}
                                            ...{{ date('\T\h\á\n\g...m') }}...{{ date('\N\ă\m...Y') }}...Số phiếu :
                                            000{{ $bill->id }}</h4>
                                        <h4 class="red-text text-center font-weight-bold">Tên khách hàng :
                                            ...{{ $bill->client->client_name }}......... SĐT:
                                            ... 0{{ $bill->client->client_phone }}</h4>
                                        <h4 class="red-text text-center font-weight-bold">Địa chỉ :
                                            ...{{ $bill->demand->address }}...
                                            {{  $bill->demand->prefecture->name }}
                                            ...{{  $bill->demand->district->name }}{{  $bill->demand->province->title }}
                                            ... </h4>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead style="border-bottom:2px solid black">
                                            <tr>
                                                <th class="text-center" style="width: 10%;border: 2px solid black">STT
                                                </th>
                                                <th class="text-center" style="width: 35%;border: 2px solid black">Tên
                                                    việc
                                                </th>
                                                <th class="text-center" style="width: 25%;border: 2px solid black">Chi
                                                    phí
                                                    phát sinh
                                                </th>
                                                <th class="text-center" style="width: 25%;border: 2px solid black">Thành
                                                    tiền
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $billDetailTotal = 0;
                                                $stt = 0;
                                            @endphp
                                            @foreach($bill->billDetails as $billDetail)
                                                @php
                                                    $stt++;
                                                @endphp
                                                <tr>
                                                    <td class="text-center"
                                                        style="border: 2px solid black">{{ $stt }}</td>
                                                    <td class="text-center"
                                                        style="border: 2px solid black">{{ $billDetail->job->job_name }}</td>
                                                    <td class="text-center" style="border: 2px solid black">Không</td>
                                                    <td class="text-center"
                                                        style="border: 2px solid black">{{ number_format($billDetail->job->job_price) }}
                                                        VNĐ
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td style="border: 2px solid black"></td>
                                                <td class="text-center"
                                                    style="font-size: 15px;font-weight: bold ;border: 2px solid black">
                                                    Tổng
                                                    cộng :
                                                </td>
                                                <td style="border: 2px solid black"><span></span></td>
                                                <td class="text-center"
                                                    style="border: 2px solid black"> {{ number_format($bill->price_total) }}
                                                    VNĐ
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold" style="font-weight: bold;font-size: 17px"
                                                    colspan="4">Thành tiền ( viết bằng chữ ) : .........{{ convert_number_to_words($bill->price_total) }} việt nam đồng .......................
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="button" class="btn btn-default" id="print">In</button>
                                <button type="submit" class="btn btn-info pull-right">Xác nhận</button>
                            </div>
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
    <script src="{{ asset('js/admin/jQuery.print.js') }}"></script>
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
            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            });
            $('#print').on('click', function () {
                $('#bill_print').print({
                        stylesheets:'red'
                    });
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
    </script>
@endsection