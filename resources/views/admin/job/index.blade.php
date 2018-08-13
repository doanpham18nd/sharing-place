@extends('admin.component.master')
@section('css')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('css/admin/pace.min.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Thêm mới</h3>
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-4">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên việc</th>
                                        <th>Khả dụng</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="text" name="job_name" id="job_name"></td>
                                        <td>
                                            <label>
                                                <input type="checkbox" id="add_available" name="available" value="1">
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Giá gốc
                                        </td>
                                        <td>
                                            <input type="number" id="add_price" name="original_price">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Giá ngày nghỉ</td>
                                        <td>
                                            <input type="number" id="add_holiday_price" name="holiday_price">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <button type="button" class="btn btn-default btn-lrg" id="add_job">
                                                Thêm mới
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="row ajax-content">
            @foreach($jobs as $job)
                <div class="col-md-4">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ID</th>
                                    <th>Tên việc</th>
                                    <th>Khả dụng</th>
                                </tr>
                                <tr>
                                    <td>{{ $job->id }}</td>
                                    <td>{{ $job->job_name }}</td>
                                    <td>
                                        <label>
                                            <input type="checkbox" name="del_flg" value="1"
                                                   @if($job->del_flg == 1) checked @endif>
                                        </label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Giá gốc
                                    </td>
                                    <td colspan="2">
                                        <input type="number" name="original_price">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Giá ngày nghỉ
                                    </td>
                                    <td colspan="2">
                                        <input type="number" name="holiday_price">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <input type="button" class="btn btn-default" value="Lưu" id="edit_job">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
        @endforeach
        <!-- /.col -->
            <!-- /.col -->
        </div>
        <div class="box-footer clearfix">
            {{ $jobs->links() }}
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@section('script')
    <script src="{{ asset('js/admin/pace.min.js') }}"></script>
    <script type="text/javascript">
        // To make Pace works on Ajax calls
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var url_add = '{{ route('job.postAdd') }}';
        $('#add_job').click(function () {
            Pace.restart();
            Pace.track(function () {
                var job_name = $('#job_name').val();
                var available = $('#add_available:checked').val();
                var price = $('#add_price').val();
                var holiday_price = $('#add_holiday_price').val();
                $.ajax({
                    type: "POST",
                    url: url_add,
                    data: {
                        job_name: job_name,
                        del_flg: available,
                        job_price: price,
                        job_price_holiday: holiday_price
                    },
                    success: function (response) {
                        $('.ajax-content').before('111');
                    },
                    failure: function (response) {
                    },
                    error: function (response) {
                    }
                });
            });
        })
    </script>
@endsection