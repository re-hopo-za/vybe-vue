<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle - Mobile Screen -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none p-2">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar Toggler -->
    <div class="text-center d-none d-md-inline">
        <button id="sidebarToggle"></button>
    </div>

    <!-- Navbar -->
    <ul class="navbar-nav mr-auto">

        <!-- User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="ml-2 d-none d-sm-inline text-blue-gray-600 small font-weight-bold">{{ Auth::user()->first_name }}</span>
                <img class="img-profile rounded-circle" src="{{ Auth::user()->getAvatarThumbAttribute() }}" alt="{{ Auth::user()->first_name }}"
                     width="60" height="60">
            </a>

            <!-- User Information Dropdown -->
            <div class="dropdown-menu dropdown-menu-left shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item {{ (request()->is('adminPanel/profile')) ? 'active' : '' }}" {{ (request()->is('adminPanel/profile')) ? '' : 'href='.route("profile.index") }}>
                    <i class="fas fa-user fa-sm fa-fw ml-2 text-blue-gray-400"></i>
                    حساب کاربری
                </a>
                @role('Super Admin')
                    <a class="dropdown-item {{ (request()->is('adminPanel/users-management')) ? 'active' : '' }}" {{ (request()->is('adminPanel/users-management')) ? '' : 'href='.route("users-management.index") }}>
                        <i class="fas fa-users fa-sm fa-fw ml-2 text-blue-gray-400"></i>
                        مدیریت کاربران
                    </a>
                    <a class="dropdown-item {{ (request()->is('adminPanel/logs')) ? 'active' : '' }}" {{ (request()->is('adminPanel/logs')) ? '' : 'href='.route("logs.index") }}>
                        <i class="fas fa-clipboard-list fa-sm fa-fw ml-2 text-blue-gray-400 fa-flip-horizontal"></i>
                        گزارش فعالیت‌ها
                    </a>
                @endrole
                <a class="dropdown-item {{ (request()->is('adminPanel/setting')) ? 'active' : '' }}" {{ (request()->is('adminPanel/setting')) ? '' : 'href='.route("setting.settingList") }}>
                    <i class="fas fa-cogs fa-sm fa-fw ml-2 text-blue-gray-400"></i>
                    تنظیمات
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw ml-2 text-blue-gray-400"></i>
                    خروج
                </a>
            </div>
        </li>

    </ul>

</nav>
<!-- End of Topbar -->
