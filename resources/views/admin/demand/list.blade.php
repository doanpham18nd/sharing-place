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
    <link rel="stylesheet" href="{{ asset('css/admin/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
    <section class="content">
        <!-- right column -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Danh sách các nhu cầu hôm nay</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Nhu cầu</th>
                        <th>Địa chỉ</th>
                        <th>Thời gian</th>
                        <th>Tạo hợp đồng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($demandListToday as $demand)
                        <tr>
                            <td>{{ $demand->client->client_name }}</td>
                            <td>
                                @foreach($demand->demandDetails as $demandDetail)
                                    -{{ $demandDetail->job->job_name }}
                                    <br>
                                @endforeach
                            </td>
                            <td>{{$demand->address . ' - ' . $demand->prefecture->name . ' - ' . $demand->district->title . ' - ' . $demand->province->title }}</td>
                            <td>
                                @if(!empty($demand->specify_time)) {{ date("d-m-Y", strtotime($demand->specify_time)) }} @endif
                                @if(!empty($demand->start_date) && !empty($demand->end_date)) {{ date("d-m-Y", strtotime($demand->start_date)) }} đến {{ date("d-m-Y", strtotime($demand->end_date)) }} @endif
                            </td>
                            <td><a class="btn btn-primary" href="{{ route('agreement.postAdd', $demand->id) }}" >Tạo hợp đồng</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!--/.col (right) -->
        <!-- /.row -->
    </section>
@endsection
@section('script')

    <!-- Select2 -->
    <script src="{{ asset('js/admin/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset('js/admin/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.inputmask.date.extensions.js') }}"></script>
    <!-- date-range-picker -->
    <!-- bootstrap color picker -->
    <script src="{{ asset('js/admin/bootstrap-colorpicker.min.js') }}"></script>
    <!-- bootstrap time picker -->
    <script src="{{ asset('js/admin/bootstrap-timepicker.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('js/admin/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/admin/dataTables.bootstrap.min.js') }}"></script>

    <!-- iCheck 1.0.1 -->
    <script src="{{ asset('js/admin/icheck.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/admin/fastclick.js') }}"></script>
    <script src="{{ asset('js/admin/pace.min.js') }}"></script>
    <!-- Page script -->
    <script>
        jQuery(window).on('load', function () {
            Pace.restart();
            $('#example1').DataTable({})
        });
    </script>
@endsection