<html>
<head>
    <!-- Bootstrap 3.3.7 -->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/admin/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('css/admin/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/admin/AdminLTE.min.css') }}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-timepicker.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('css/admin/daterangepicker.css') }}">
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('css/admin/_all-skins.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('css/admin/all.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-colorpicker.min.css') }}">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-timepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('css/admin/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/pace.min.css') }}">
    <style>
        body {
            color: red;
        }
    </style>
</head>
<body>
<div class="row">
        <!-- right column -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-default">
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group col-md-4">
                            <h2 class="red-text text-center"
                                style="font-weight: 900 ;">{{ mb_strtoupper($bill->vendor->vendor_name) }}</h2>
                            <h4 class="red-text text-center font-weight-bold">-----------------------------</h4>
                            <h4 class="red-text text-center font-weight-bold">ĐC : {{ $bill->vendor->address }}
                                -
                                {{ $bill->vendor->prefecture->name }} - {{ $bill->vendor->district->title }}
                                - {{ $bill->vendor->province->title }}
                            </h4>
                            <h4 class="red-text text-center font-weight-bold">SĐT : 0{{ $bill->vendor->vendor_phone }}
                            </h4>
                        </div>
                        <div class="form-group col-md-8">
                            <h2 class="red-text text-center font-weight-bold" style="font-weight: 900 ;">HÓA ĐƠN
                                SỬA CHỮA-BÁN LẺ</h2>
                            <h4 class="red-text text-center">{{ date('\N\g\à\y...d') }}
                                ... {{ date('\T\h\á\n\g...m') }}... {{ date('\N\ă\m...Y') }}...Số phiếu :
                                000{{ $bill->id }} /HĐMB</h4>
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
                                    <th class="text-center" style="width: 10%;border: 2px solid black">STT</th>
                                    <th class="text-center" style="width: 35%;border: 2px solid black">Tên việc</th>
                                    <th class="text-center" style="width: 25%;border: 2px solid black">Chi phí phát
                                        sinh
                                    </th>
                                    <th class="text-center" style="width: 25%;border: 2px solid black">Thành tiền</th>
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
                                        <td class="text-center" style="border: 2px solid black">{{ $stt }}</td>
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
                                        style="font-size: 15px;font-weight: bold ;border: 2px solid black">Tổng cộng :
                                    </td>
                                    <td style="border: 2px solid black"><span></span></td>
                                    <td class="text-center"
                                        style="border: 2px solid black"> {{ number_format($bill->price_total) }}VNĐ
                                    </td>
                                    <input type="hidden" value="" name="price_total">
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" style="font-weight: bold;font-size: 17px" colspan="4">
                                        Thành tiền ( viết bằng chữ ) :
                                        .........{{ convert_number_to_words($bill->price_total) }} việt nam
                                        đồng...........................................................................
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</body>
</html>