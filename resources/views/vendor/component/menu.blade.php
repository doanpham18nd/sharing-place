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
            <li class="{{  (\Request::route()->getName() == 'vendor.index') ? 'active' : '' }}">
                <a href="{{ route('vendor.index') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Trang chủ</span>
                    <span class="pull-right-container"><span class="label label-primary pull-right">4</span></span>
                </a>
            </li>
            <li class="{{ (\Request::route()->getName() == 'demand.index') || \Request::route()->getName() == 'demand.list'  ? 'active' : '' }} treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Nhu cầu</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ (\Request::route()->getName() == 'demand.list') ? 'active' : '' }}"><a href="{{ route('demand.list') }}"><i class="fa fa-circle-o"></i>Nhu cầu hôm nay</a></li>
                    <li class="{{ (\Request::route()->getName() == 'demand.index') ? 'active' : '' }}"><a href="{{ route('demand.index') }}"><a href="{{ route('demand.index') }}"><i class="fa fa-circle-o"></i>Tạo nhu cầu</a></li>
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
                    <li class="{{ (\Request::route()->getName() == 'demand.list') ? 'active' : '' }}"><a href="{{ route('demand.list') }}"><i class="fa fa-circle-o"></i>Nhu cầu hôm nay</a></li>
                    <li class="{{ (\Request::route()->getName() == 'demand.index') ? 'active' : '' }}"><a href="{{ route('demand.index') }}"><a href="{{ route('demand.index') }}"><i class="fa fa-circle-o"></i>Tạo nhu cầu</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>