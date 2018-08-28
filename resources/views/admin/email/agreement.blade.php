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
</head>
<body>
<section class="content">
    <div class="form-group">
        <h4 class="red-text text-center font-weight-bold">Kính gửi {{ $vendor->vendor_name }}</h4>
        <h4 class="red-text text-center font-weight-bold">Để xác nhận và thực hiện nhận hợp đồng này.Vui lòng nhấn vào
            link dưới đây</h4>
        <h4 class="red-text text-center font-weight-bold"><a href="{{ route('vendor.confirmAgreement', $agreementId) }}">Xác nhận
                thực hiện hợp đồng</a></h4>
        <h4 class="red-text text-center font-weight-bold">Nội dung hợp đồng có thể xem trước tại đây</h4>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div>
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
                                DÙNG(BÊN A)</h3>
                        </div>
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td>Tên khách hàng :</td>
                                <td>{{ $demand->client->client_name }}</td>
                            </tr>
                            <tr>
                                <td>Số điện thoại :</td>
                                <td>0{{ $demand->client->client_phone }}</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ :</td>
                                <td>{{ $demand->address }}-{{ $demand->prefecture->name }}
                                    -{{ $demand->district->title }}-{{ $demand->province->title }}</td>
                            </tr>
                            <tr>
                                <td>Nhu cầu</td>
                                <td>
                                    @foreach($demand->demandDetails as $demandDetail)
                                        - {{ $demandDetail->job->job_name }}
                                        <br>
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <div class="box-header with-border">
                            <h3 class="box-title font-weight-bold" style="font-weight: bold">THÔNG TIN DOANH
                                NGHIỆP(BÊN B)</h3>
                        </div>
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <td>Trụ sở chính :</td>
                                <td id="vendor_address">{{ $vendor->address }} - {{ $vendor->prefecture->name }}
                                    - {{ $vendor->district->title }} - {{ $vendor->province->title }}</td>
                            </tr>
                            <tr>
                                <td>Số điện thoại :</td>
                                <td id="vendor_phone">0{{ $vendor->vendor_phone }}</td>
                            </tr>
                            <tr>
                                <td>Email :</td>
                                <td id="vendor_email">{{ $vendor->vendor_email }}</td>
                            </tr>
                            <tr>
                                <td>Tài khoản ngân hàng :</td>
                                <td id="vendor_bank">{{ $vendor->vendor_bank }} - Ngân
                                    hàng {{ $vendor->bank_name }}</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <br>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="box-header with-border">
                            <h3 class="box-title font-weight-bold" style="font-weight: bold">CHI TIẾT CÔNG
                                VIỆC</h3>
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
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="box-header with-border">
                            <h3 class="box-title font-weight-bold" style="font-weight: bold">THỜI GIAN SỬA
                                CHỮA</h3>
                        </div>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>1. Bên B có trách nhiệm hoàn tất việc sửa chữa trong thời hạn là
                                    @if(!empty($demand->specify_time))
                                        Trong ngày
                                        : {{ \Carbon\Carbon::parse($demand->specify_time)->format('d-m-Y') }}
                                    @elseif(!empty($demand->start_date) && !empty($demand->end_date))
                                        {{ \Carbon\Carbon::parse($demand->start_date)->format('d-m-Y') . ' đến ngày ' . \Carbon\Carbon::parse($demand->end_date)->format('d-m-Y')}}
                                        .
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2. Nếu có khó khăn về vật tư hoặc gặp hoàn cảnh đột xuất không thể khắc phục
                                    thì Bên B báo cho Bên A xin kéo dài thêm một thời gian cần thiết,
                                    nếu Bên A không được thông báo Bên B giao nghiệm thu chậm, coi như vi phạm
                                    hợp đồng.
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="box-header with-border">
                            <h3 class="box-title font-weight-bold" style="font-weight: bold">NGHIỆM THU(NẾU
                                CÓ)</h3>
                        </div>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>1. Bên A có quyền mời cơ quan giám định chuyên môn hoặc chuyên gia giúp cho
                                    mình kiểm tra chất lượng sửa chữa vào thành phần ban nghiệm thu.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2. Giúp Bên B có trách nhiệm chuẩn bị các điều kiện cho hoạt động nghiệm thu
                                    theo 2 đợt,
                                    đợt 1 khi đạt 50% giá trị hợp đồng và đợt 2 khi hoàn tất (nếu công việc đơn
                                    giản, thực hiện trong thời gian ngắn thì nghiệm thu một lần).
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="box-header with-border">
                            <h3 class="box-title font-weight-bold" style="font-weight: bold">BÀO HÀNH</h3>
                        </div>
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>1. Thời gian bảo hành kết quả sửa chữa
                                    ...................................... (tháng, năm)
                                    <br><br>
                                    Lưu ý: Việc bảo hành có thể dựa theo quy định của Nhà nước, nếu không có thì
                                    hai bên tự thỏa thun.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2. Trong thời hạn bảo hành nếu Bên A phát hiện có hư hỏng, sai sót về chất
                                    lượng, về kỹ thuật thì phải thông báo kịp thời bằng văn bản cho Bên B biết
                                    để cùng nhau xác minh. Việc xác minh phải được tiến hành không chậm quá 15
                                    ngày kể từ ngày nhận được thông báo. Việc xác minh phải được lập thành biên
                                    bản. Hai bên có kết luận rõ ràng về nguyên nhân gây ra hư hỏng, xác định
                                    trách nhiệm sửa chữa các hư hỏng đó thuộc về bên nào, quy định thời gian sửa
                                    chữa.
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    3. Trong thời hạn 15 ngày kể từ ngày nhận được thông báo, nếu Bên B không
                                    trả lời thì coi như đã chấp thuận có sai sót và có trách nhiệm sửa chữa sai
                                    sót đó.
                                </td>
                            </tr>
                            <tr>
                                <td>4. Nếu sai sót không được sửa chữa hoặc việc sửa chữa kéo dài dẫn đến những
                                    thiệt hại khác trong kế hoạch sử dụng máy thì Bên A có quyền phạt bên B vi
                                    phạm hợp đồng là 10 % giá trị bộ phận hư hỏng và bắt bồi thường thiệt
                                    hại như trường hợp không thực hiện hợp đồng.
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>
</body>
</html>