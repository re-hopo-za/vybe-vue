<ul class="nav nav-pills card-header-pills justify-content-center">
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('adminPanel/profile')) ? 'active' : '' }}"
            {{ (request()->is('adminPanel/profile')) ? '' : 'href='.route("profile.index") }}>مشخصات کاربر</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('adminPanel/profile/twoFA')) ? 'active' : '' }}"
            {{ (request()->is('adminPanel/profile/twoFA')) ? '' : 'href='.route("profile.twoFA") }}>تنظیمات امنیتی</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('adminPanel/profile/changePassword')) ? 'active' : '' }}"
            {{ (request()->is('adminPanel/profile/changePassword')) ? '' : 'href='.route("profile.changePassword") }}>تغییر رمزعبور</a>
    </li>
</ul>
