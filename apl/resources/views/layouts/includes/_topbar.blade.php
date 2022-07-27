<div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default header-menu-root-arrow">
    <!--begin::Header Nav-->
    <ul class="menu-nav">
        <li class="menu-item {{ Request::is('*dashboard*') ? 'menu-item-open menu-item-here' : ''}}  menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
            <a href="{{ route('dashboard') }}" class="menu-link     ">
                <span class="menu-text">Dashboard</span>
            </a>
        </li>
        <li class="menu-item {{ Request::is('*master*') ? 'menu-item-open menu-item-here' : ''}} menu-item-submenu menu-item-rel " data-menu-toggle="click" aria-haspopup="true">
            <a href="javascript:;" class="menu-link menu-toggle">
                <span class="menu-text">Master Data</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                <ul class="menu-subnav">
                    <li class="menu-item {{ Request::is('*salesman*') ? 'menu-item-active' : ''}} " aria-haspopup="true">
                        <a href="{{route("master.salesman")}}" class="menu-link">
                            <span class="menu-text">Salesman</span>
                            <span class="menu-desc"></span>
                        </a>
                    </li>
                    {{-- <li class="menu-item {{ Request::is('*master/karyawan*') ? 'menu-item-active' : ''}} " aria-haspopup="true">
                        <a href="{{ route('master.karyawan.index') }}" class="menu-link">
                            <span class="menu-text">Karyawan</span>
                            <span class="menu-desc"></span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </li>
    </ul>
    <!--end::Header Nav-->
</div>