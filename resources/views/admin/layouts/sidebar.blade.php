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
                <li class="menu-title">Manajemen Kartu</li>
                <li>
                    <a href="{{ route('category') }}" class="waves-effect">
                        <i class="bx bx-package"></i>
                        <span key="t-categories">Kategori</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('card') }}" class="waves-effect">
                        <i class="bx bx-package"></i>
                        <span key="t-cards">Kartu</span>
                    </a>
                </li>

                <li class="menu-title">Kelola Member</li>
                <li>
                    <a href="{{ route('member') }}" class="waves-effect">
                        <i class="bx bx-user"></i>
                        <span key="t-members">Member</span>
                    </a>
                </li>
                <li class="menu-title">Pengaturan</li>
                <li>
                    <a href="{{ route('faq') }}" class="waves-effect">
                        <i class="bx bx-package"></i>
                        <span key="t-faqs">FAQ</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('disclaimer') }}" class="waves-effect">
                        <i class="bx bx-package"></i>
                        <span key="t-disclaimers">Disclaimer</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
