<div class="main">
    <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                        <span class="text-dark">
                            <?= $user["nama"] ?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="../view_user/profile.php"><i class="align-middle me-1"
                                data-feather="user"></i>
                            Profile</a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="../logout.php"
                            onclick="return confirm('Yakin ingin keluar dari aplikasi?');"><i class="align-middle me-1"
                                data-feather="log-out"></i>Log
                            out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>