<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

            </ul>
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Web</li>

                <li>
                    <a href="{{ route('category') }}" class="waves-effect">
                        <i class="bx bx-package"></i>
                        <span key="t-categories">Kategori</span>
                    </a>
                </li>
            </ul>
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-managements">Management Users</li>

                <li>
                    <a href="{{ route('users') }}" class="waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-users">Kelola Pengguna</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
