<ul class="nav nav-pills card-header-pills justify-content-center">
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('adminPanel/users-management/*/edit')) ? 'active' : '' }}"
            {{ (request()->is('adminPanel/users-management/*/edit')) ? '' : 'href='.route("users-management.userEdit", $user->id) }}>مشخصات کاربر</a>
    </li>
    @if($user->getRoleName()->first() != 'Super Admin')
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('adminPanel/users-management/*/editRole')) ? 'active' : '' }}"
                {{ (request()->is('adminPanel/users-management/*/editRole')) ? '' : 'href='.route("users-management.userEditRole", $user->id) }}>نقش کاربر</a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link {{ (request()->is('adminPanel/users-management/*/editPassword')) ? 'active' : '' }}"
            {{ (request()->is('adminPanel/users-management/*/editPassword')) ? '' : 'href='.route("users-management.userEditPassword", $user->id) }}>تغییر رمزعبور</a>
    </li>
</ul>
