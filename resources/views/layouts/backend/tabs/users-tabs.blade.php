<ul class="nav nav-pills card-header-pills justify-content-center">
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('adminPanel/users-management')) ? 'active' : '' }}"
                {{ (request()->is('adminPanel/users-management')) ? '' : 'href='.route("users-management.index") }}>مدیریت کاربران</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('adminPanel/setting/rolesAndPermissions')) ? 'active' : '' }}"
                {{ (request()->is('adminPanel/setting/rolesAndPermissions')) ? '' : 'href='.route("setting.acl") }}>سطوح دسترسی</a>
    </li>
</ul>