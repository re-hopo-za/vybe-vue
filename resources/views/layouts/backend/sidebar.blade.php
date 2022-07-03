<!-- Sidebar -->
<ul class="navbar-nav bg-blue-gray-700 sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center text-white" {{ (request()->is('adminPanel')) ? '' : 'href='.route('adminPanel') }}>
        <div class="sidebar-brand-icon">
            <i class="fab fa-laravel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">پنل مدیریت <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ (request()->is('adminPanel')) ? 'active' : '' }}">
        <a class="nav-link" {{ (request()->is('adminPanel')) ? '' : 'href='.route('adminPanel') }}>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>داشبورد</span>
        </a>
    </li>

    <!-- Website -->
    <li class="nav-item">
        <a class="nav-link" href="http://thevybestudios.com/">
            <i class="fas fa-fw fa-window-alt"></i>
            <span>مشاهده سایت</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        مدیریت محتوا
    </div>

    <!-- Category Menu -->
    <li class="nav-item {{ (request()->is('adminPanel/category/*')) | (request()->is('adminPanel/category')) ? 'active' : '' }}">
        <a class="nav-link {{ (request()->is('adminPanel/category/*')) | (request()->is('adminPanel/category')) ? '' : 'collapsed' }}" href="#"
           data-toggle="collapse" data-target="#collapseCategory" aria-controls="collapseCategory"
           aria-expanded="{{ (request()->is('adminPanel/category/*')) | (request()->is('adminPanel/category')) ? 'true' : 'false' }}">
            <i class="fas fa-folder-tree"></i>
            <span>دسته‌بندی</span>
        </a>
        <div id="collapseCategory" class="collapse {{ (request()->is('adminPanel/category/*')) | (request()->is('adminPanel/category')) ? 'show' : '' }}"
             aria-labelledby="headingCategory" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ (request()->is('adminPanel/category/create')) ? 'active' : '' }}"
                    {{ (request()->is('adminPanel/category/create')) ? '' : 'href='.route("category.categoryCreate") }}>
                    ایجاد دسته‌بندی
                </a>
                <a class="collapse-item {{ (request()->is('adminPanel/category')) ? 'active' : '' }}"
                    {{ (request()->is('adminPanel/category')) ? '' : 'href='.route("category.categoryList") }}>
                    لیست دسته‌بندی‌ها
                </a>
                <a class="collapse-item {{ (request()->is('adminPanel/category/trash')) ? 'active' : '' }}"
                    {{ (request()->is('adminPanel/category/trash')) ? '' : 'href='.route("category.categoryTrash") }}>
                    بایگانی دسته‌بندی‌ها
                </a>
            </div>
        </div>
    </li>

    <!-- Tag Menu -->
    <li class="nav-item {{ (request()->is('adminPanel/tag/*')) | (request()->is('adminPanel/tag')) ? 'active' : '' }}">
        <a class="nav-link {{ (request()->is('adminPanel/tag/*')) | (request()->is('adminPanel/tag')) ? '' : 'collapsed' }}" href="#"
           data-toggle="collapse" data-target="#collapseTag" aria-controls="collapseTag"
           aria-expanded="{{ (request()->is('adminPanel/tag/*')) | (request()->is('adminPanel/tag')) ? 'true' : 'false' }}">
            <i class="fas fa-tag"></i>
            <span>تگ</span>
        </a>
        <div id="collapseTag" class="collapse {{ (request()->is('adminPanel/tag/*')) | (request()->is('adminPanel/tag')) ? 'show' : '' }}"
             aria-labelledby="headingTag" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ (request()->is('adminPanel/tag/create')) ? 'active' : '' }}"
                    {{ (request()->is('adminPanel/tag/create')) ? '' : 'href='.route("tag.tagCreate") }}>
                    ایجاد تگ
                </a>
                <a class="collapse-item {{ (request()->is('adminPanel/tag')) ? 'active' : '' }}"
                    {{ (request()->is('adminPanel/tag')) ? '' : 'href='.route("tag.tagList") }}>
                    لیست تگ‌ها
                </a>
                <a class="collapse-item {{ (request()->is('adminPanel/tag/trash')) ? 'active' : '' }}"
                    {{ (request()->is('adminPanel/tag/trash')) ? '' : 'href='.route("tag.tagTrash") }}>
                    بایگانی تگ‌ها
                </a>
            </div>
        </div>
    </li>

    <!-- Post Menu -->
    <li class="nav-item {{ (request()->is('adminPanel/post/*')) | (request()->is('adminPanel/post')) ? 'active' : '' }}">
        <a class="nav-link {{ (request()->is('adminPanel/post/*')) | (request()->is('adminPanel/post')) ? '' : 'collapsed' }}" href="#"
           data-toggle="collapse" data-target="#collapsePost" aria-controls="collapsePost"
           aria-expanded="{{ (request()->is('adminPanel/post/*')) | (request()->is('adminPanel/post')) ? 'true' : 'false' }}">
            <i class="fas fa-blog"></i>
            <span>مطلب</span>
        </a>
        <div id="collapsePost" class="collapse {{ (request()->is('adminPanel/post/*')) | (request()->is('adminPanel/post')) ? 'show' : '' }}"
             aria-labelledby="headingPost" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ (request()->is('adminPanel/post/create/*')) ? 'active' : '' }}"
                    {{ (request()->is('adminPanel/post/create/*')) ? '' : 'href='.route("post.create.createDefault") }}>
                    ایجاد مطلب
                </a>
                <a class="collapse-item {{ (request()->is('adminPanel/post')) ? 'active' : '' }}"
                    {{ (request()->is('adminPanel/post')) ? '' : 'href='.route("post.postList") }}>
                    لیست مطالب
                </a>
                <a class="collapse-item {{ (request()->is('adminPanel/post/trash')) ? 'active' : '' }}"
                    {{ (request()->is('adminPanel/post/trash')) ? '' : 'href='.route("post.postTrash") }}>
                    بایگانی مطالب
                </a>
            </div>
        </div>
    </li>

    <!-- Service Menu -->
    <li class="nav-item {{ (request()->is('adminPanel/service/*')) | (request()->is('adminPanel/service')) ? 'active' : '' }}">
        <a class="nav-link {{ (request()->is('adminPanel/service/*')) | (request()->is('adminPanel/service')) ? '' : 'collapsed' }}" href="#"
           data-toggle="collapse" data-target="#collapseService" aria-controls="collapseService"
           aria-expanded="{{ (request()->is('adminPanel/service/*')) | (request()->is('adminPanel/service')) ? 'true' : 'false' }}">
            <i class="fas fa-tools"></i>
            <span>سرویس</span>
        </a>
        <div id="collapseService" class="collapse {{ (request()->is('adminPanel/service/*')) | (request()->is('adminPanel/service')) ? 'show' : '' }}"
             aria-labelledby="headingService" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ (request()->is('adminPanel/service/create')) ? 'active' : '' }}"
                        {{ (request()->is('adminPanel/service/create')) ? '' : 'href='.route("service.serviceCreate") }}>
                    ایجاد سرویس
                </a>
                <a class="collapse-item {{ (request()->is('adminPanel/service')) ? 'active' : '' }}"
                        {{ (request()->is('adminPanel/service')) ? '' : 'href='.route("service.serviceList") }}>
                    لیست سرویس‌ها
                </a>
                <a class="collapse-item {{ (request()->is('adminPanel/service/trash')) ? 'active' : '' }}"
                        {{ (request()->is('adminPanel/service/trash')) ? '' : 'href='.route("service.serviceTrash") }}>
                    بایگانی سرویس‌ها
                </a>
            </div>
        </div>
    </li>

    <!-- Work Menu -->
    <li class="nav-item {{ (request()->is('adminPanel/work/*')) | (request()->is('adminPanel/work')) ? 'active' : '' }}">
        <a class="nav-link {{ (request()->is('adminPanel/work/*')) | (request()->is('adminPanel/work')) ? '' : 'collapsed' }}" href="#"
           data-toggle="collapse" data-target="#collapseWork" aria-controls="collapseWork"
           aria-expanded="{{ (request()->is('adminPanel/work/*')) | (request()->is('adminPanel/work')) ? 'true' : 'false' }}">
            <i class="fas fa-images"></i>
            <span>نمونه کار</span>
        </a>
        <div id="collapseWork" class="collapse {{ (request()->is('adminPanel/work/*')) | (request()->is('adminPanel/work')) ? 'show' : '' }}"
             aria-labelledby="headingWork" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ (request()->is('adminPanel/work/create')) ? 'active' : '' }}"
                        {{ (request()->is('adminPanel/work/create')) ? '' : 'href='.route("work.workCreate") }}>
                    ایجاد نمونه کار
                </a>
                <a class="collapse-item {{ (request()->is('adminPanel/work')) ? 'active' : '' }}"
                        {{ (request()->is('adminPanel/work')) ? '' : 'href='.route("work.workList") }}>
                    لیست نمونه کارها
                </a>
                <a class="collapse-item {{ (request()->is('adminPanel/work/trash')) ? 'active' : '' }}"
                        {{ (request()->is('adminPanel/work/trash')) ? '' : 'href='.route("work.workTrash") }}>
                    بایگانی نمونه کارها
                </a>
            </div>
        </div>
    </li>

    <!-- Customer Menu -->
    <li class="nav-item {{ (request()->is('adminPanel/customer/*')) | (request()->is('adminPanel/customer')) ? 'active' : '' }}">
        <a class="nav-link {{ (request()->is('adminPanel/customer/*')) | (request()->is('adminPanel/customer')) ? '' : 'collapsed' }}" href="#"
           data-toggle="collapse" data-target="#collapseCustomer" aria-controls="collapseCustomer"
           aria-expanded="{{ (request()->is('adminPanel/customer/*')) | (request()->is('adminPanel/customer')) ? 'true' : 'false' }}">
            <i class="fas fa-users-crown"></i>
            <span>مشتری</span>
        </a>
        <div id="collapseCustomer" class="collapse {{ (request()->is('adminPanel/customer/*')) | (request()->is('adminPanel/customer')) ? 'show' : '' }}"
             aria-labelledby="headingCustomer" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ (request()->is('adminPanel/customer/create')) ? 'active' : '' }}"
                        {{ (request()->is('adminPanel/customer/create')) ? '' : 'href='.route("customer.customerCreate") }}>
                    ایجاد مشتری
                </a>
                <a class="collapse-item {{ (request()->is('adminPanel/customer')) ? 'active' : '' }}"
                        {{ (request()->is('adminPanel/customer')) ? '' : 'href='.route("customer.customerList") }}>
                    لیست مشتریان
                </a>
                <a class="collapse-item {{ (request()->is('adminPanel/customer/trash')) ? 'active' : '' }}"
                        {{ (request()->is('adminPanel/customer/trash')) ? '' : 'href='.route("customer.customerTrash") }}>
                    بایگانی مشتریان
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        ابزارک‌ها
    </div>

    <!-- Shorten Link -->
    <li class="nav-item {{ (request()->is('adminPanel/short-link')) ? 'active' : '' }}">
        <a class="nav-link" {{ (request()->is('adminPanel/short-link')) ? '' : 'href='.route("short-link.shortLinkList") }}>
            <i class="fas fa-link"></i>
            <span>کوتاه کنند لینک</span>
        </a>
    </li>

</ul>
<!-- End of Sidebar -->
