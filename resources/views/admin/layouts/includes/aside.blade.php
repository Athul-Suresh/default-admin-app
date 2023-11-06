<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="Admin Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                @canany(['permission list', 'role list', 'user list'])

                <li
                    class="nav-item {{ request()->routeIs('admin.permissions.*', 'admin.roles.*', 'admin.users.*') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            User Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        @can('permission list')
                        <li class="nav-item">
                            <a href="{{ route('admin.permissions.index') }}"
                                class="nav-link  {{ request()->routeIs('admin.permissions.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permission</p>
                            </a>
                        </li>
                        @endcan
                        @can('role list')
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}"
                                class="nav-link  {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @endcan
                        @can('user list')
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="nav-link  {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
            @endcanany

            @canany(['menu list'])
                <li class="nav-item {{ request()->routeIs('admin.menus.*') ? 'menu-open' : '' }}">

                    <a href="#" class="nav-link">

                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('menu list')
                        <li class="nav-item">
                            <a href="{{ route('admin.menus.index') }}"
                                class="nav-link  {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Menus</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>

                @endcanany

@if (Auth::check())

                <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{route('logout')}}" class="nav-link"
                            onclick="event.preventDefault();
                                this.closest('form').submit();">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p>Logout</p>

                        </a>
                        </form>
                </li>

                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
