<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{  (\Request::route()->getName() == 'admin.index') ? 'active' : '' }}">
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Trang chủ</span>
                    <span class="pull-right-container"><span class="label label-primary pull-right">4</span></span>
                </a>
            </li>
            <li class="{{ (\Request::route()->getName() == 'demand.index') || 'demand.list'  ? 'active' : '' }} treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Nhu cầu</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (\Request::route()->getName() == 'demand.index') ? 'active' : '' }}"><a href="{{ route('demand.index') }}"><i class="fa fa-circle-o"></i>Tạo mới</a></li>
                    <li class="{{ (\Request::route()->getName() == 'demand.search') ? 'active' : '' }}"><a href="{{ route('demand.search') }}"><i class="fa fa-circle-o"></i>Tìm kiếm</a></li>
                    <li class="{{ (\Request::route()->getName() == 'demand.list') ? 'active' : '' }}"><a href="{{ route('demand.list') }}"><i class="fa fa-circle-o"></i>Hôm nay</a></li>
                    <li class="{{ (\Request::route()->getName() == 'demand.confirming') ? 'active' : '' }}"><a href="{{ route('demand.confirming') }}"><i class="fa fa-circle-o"></i>Đang xác nhận</a></li>
                    <li class="{{ (\Request::route()->getName() == 'demand.working') ? 'active' : '' }}"><a href="{{ route('demand.working') }}"><i class="fa fa-circle-o"></i>Đang thực hiện</a></li>
                    <li class="{{ (\Request::route()->getName() == 'demand.done') ? 'active' : '' }}"><a href="{{ route('demand.done') }}"><i class="fa fa-circle-o"></i>Đã hoàn thành</a></li>
                    <li class="{{ (\Request::route()->getName() == 'demand.cancel') ? 'active' : '' }}"><a href="{{ route('demand.cancel') }}"><i class="fa fa-circle-o"></i>Bị hủy bỏ</a></li>

                </ul>
            </li>
            <li class="{{ (\Request::route()->getName() == 'agreement.index') || \Request::route()->getName() == 'agreement.getAdd'  ? 'active' : '' }} treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Hợp đồng</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (\Request::route()->getName() == 'agreement.getAdd') ? 'active' : '' }}"><a href="{{ route('agreement.getAdd') }}"><i class="fa fa-circle-o"></i>Tạo nhu cầu</a></li>
                    <li class="{{ (\Request::route()->getName() == 'agreement.index') ? 'active' : '' }}"><a href="{{ route('agreement.index') }}"><i class="fa fa-circle-o"></i>Nhu cầu hôm nay</a></li>
                </ul>
            </li>
            <li class="{{ (\Request::route()->getName() == 'company.index') || \Request::route()->getName() == ''  ? 'active' : '' }} treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Công ty</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (\Request::route()->getName() == 'company.index') ? 'active' : '' }}"><a href="{{ route('company.index') }}"><i class="fa fa-circle-o"></i>Danh sách công ty</a></li>
{{--                    <li class="{{ (\Request::route()->getName() == 'company.getAdd') ? 'active' : '' }}"><a href="{{ route('company.getAdd') }}"><i class="fa fa-circle-o"></i>Tạo công ty</a></li>--}}
                </ul>
            </li>
            <li class="{{ (\Request::route()->getName() == 'company.index') || \Request::route()->getName() == ''  ? 'active' : '' }} treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Thống kê</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (\Request::route()->getName() == 'company.index') ? 'active' : '' }}"><a href="{{ route('company.index') }}"><i class="fa fa-circle-o"></i>Danh sách công ty</a></li>
                    {{--                    <li class="{{ (\Request::route()->getName() == 'company.getAdd') ? 'active' : '' }}"><a href="{{ route('company.getAdd') }}"><i class="fa fa-circle-o"></i>Tạo công ty</a></li>--}}
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>