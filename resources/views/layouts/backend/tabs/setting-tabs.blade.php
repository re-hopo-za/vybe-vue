<ul class="nav nav-pills card-header-pills justify-content-center">
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('adminPanel/setting')) ? 'active' : '' }}"
                {{ (request()->is('adminPanel/setting')) ? '' : 'href='.route("setting.settingList") }}>تنظیمات عمومی</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('adminPanel/setting/clearCache')) ? 'active' : '' }}"
            {{ (request()->is('adminPanel/setting/clearCache')) ? '' : 'href='.route("setting.clearCache") }}>حذف حافظه‌های پنهان</a>
    </li>
</ul>
