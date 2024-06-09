<ul class="menu-inner py-1">
    <!-- Dashboards -->
    @if (Auth::user()->hasAnyPermission(['dashboard.view']))
        <li class="menu-item {{ Route::is('home') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
            @can('dashboard.view')
                <ul class="menu-sub">
                    <li class="menu-item {{ Route::is('home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}" class="menu-link">
                            <div data-i18n="Dashboard">Dashboard</div>
                        </a>
                    </li>
                </ul>
            @endcan
        </li>
    @endif
    @if (Auth::user()->hasAnyPermission(['User-view']))
        <li class="menu-item {{ Route::is('users.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
            </a>
            <ul class="menu-sub">
                @can('User-view')
                    <li class="menu-item {{ Route::is('users.*') ? 'active' : '' }}">
                        <a href="{{ route('users.index') }}" class="menu-link">
                            <div data-i18n="List">List</div>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
    @endif
    @if (Auth::user()->hasAnyPermission(['role-list']))
        <li class="menu-item {{ Route::is('roles.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <div data-i18n="Roles & Permissions">Roles & Permissions</div>
            </a>
            @can('role-list')
                <ul class="menu-sub">
                    <li class="menu-item {{ Route::is('roles.*') ? 'active ' : '' }}">
                        <a href="{{ route('roles.index') }}" class="menu-link">
                            <div data-i18n="Roles">Roles</div>
                        </a>
                    </li>
                </ul>
            @endcan
        </li>
    @endif
</ul>
