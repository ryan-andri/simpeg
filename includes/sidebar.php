<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user-cog"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <!-- Ini Panel Nama -->
            <span class="dropdown-item dropdown-header">Kolonel Wiganda</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-user mr-2"></i>Lihat Profile
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-user-lock mr-2"></i>Ubah Password
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i>Log out
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="<?= BASE_URL ?>/assets/img/hesti.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIMPEG ONLINE</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= BASE_URL ?>" class="nav-link <?= (CURRENT_PAGE == "simpeg") ? "active" : "" ?>">
                <i class="nav-icon fas fa-desktop"></i>
                <p>
                  Beranda
                </p>
              </a>
            </li>
            <li class="nav-header">MANAGEMENT</li>
            <li class="nav-item <?= (CURRENT_PAGE == "kepegawaian_tni" || CURRENT_PAGE == "kepegawaian_pns" || CURRENT_PAGE == 'kepegawaian_tks') ? "menu-is-opening menu-open" : "" ?>">
              <a href="#" class="nav-link <?= (CURRENT_PAGE == "kepegawaian_tni" || CURRENT_PAGE == "kepegawaian_pns" || CURRENT_PAGE == 'kepegawaian_tks') ? "active" : "" ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Kepegawaian
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= BASE_URL ?>/pages/kepegawaian_tni" class="nav-link <?= (CURRENT_PAGE == "kepegawaian_tni") ? "active" : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>TNI</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= BASE_URL ?>/pages/kepegawaian_pns" class="nav-link <?= (CURRENT_PAGE == "kepegawaian_pns") ? "active" : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>PNS</p>
                  </a>
                </li>
                <li class="nav-item">
                <a href="<?= BASE_URL ?>/pages/kepegawaian_tks" class="nav-link <?= (CURRENT_PAGE == "kepegawaian_tks") ? "active" : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>TKS</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="<?= BASE_URL ?>/pages/pengajuan_cuti" class="nav-link <?= (CURRENT_PAGE == "pengajuan_cuti") ? "active" : "" ?>">
                <i class="nav-icon fas fa-envelope"></i>
                <p>
                  Pengajuan Cuti
                </p>
              </a>
            </li>

            <li class="nav-header">MASTER DATA</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Pegawai
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/mailbox/mailbox.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>TNI</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/mailbox/compose.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>PNS</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/mailbox/read-mail.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>TKS</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>Data Pengguna</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>