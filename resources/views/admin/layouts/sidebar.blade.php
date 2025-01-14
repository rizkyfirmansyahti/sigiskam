<div class="vertical-menu side" style="background-color: #439283">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu" style="color: white">Menu</li>
                <li>
                    <a href="/admin/dashboard" class="{{ Request::is('admin/dashboard*') ? 'active' : 'not-active' }}">
                        <i class="mdi mdi-home-variant-outline"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/users" class="{{ Request::is('admin/users*') ? 'active' : 'not-active' }}">
                        <i class="mdi mdi-account-outline"></i>
                        <span data-key="t-authentication">Users</span>
                    </a>
                </li>
                <li>
                    <a href="/admin/data-gis" class="{{ Request::is('admin/data-gis*') ? 'active' : 'not-active' }}">
                        <i class="mdi mdi-account-outline"></i>
                        <span data-key="t-authentication">Data GIS</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>
