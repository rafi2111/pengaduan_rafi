  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
          <i class="fas fa-comments"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pengaduan Masyarakat</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <?php if ($this->session->userdata('nik')) : ?>
          <a class="nav-link" href="<?= base_url('user'); ?>">
          <?php elseif ($this->session->userdata('level')) : ?>
            <a class="nav-link" href="<?= base_url('admin'); ?>">
            <?php endif; ?>
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        <?php if ($this->session->userdata('level')) : ?>
          Admin
        <?php elseif ($this->session->userdata('nik')) : ?>
          User
        <?php endif; ?>
      </div>

      <?php if ($this->session->userdata('level')) : ?>

        <!-- Nav Item - Pages Collapse Menu -->
        <?php if ($this->session->userdata('level') == 1) : ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-database"></i>
              <span>Management Data</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('master/masyarakat'); ?>">Data Masyarakat</a>
                <a class="collapse-item" href="<?= base_url('master/petugas'); ?>">Data Petugas</a>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('generate '); ?>">
              <i class="fas fa-fw fa-download"></i>
              <span>Buat Laporan</span></a>
          </li>

        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('pengaduan '); ?>">
            <i class="fas fa-fw fa-file"></i>
            <span>Data Pengaduan</span></a>
        </li>



      <?php elseif ($this->session->userdata('nik')) : ?>

        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('laporan'); ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>Laporan Pengaduan</span></a>
        </li>
      <?php endif; ?>

      <li class="nav-item">
        <?php if ($this->session->userdata('level')) : ?>
          <a class="nav-link" href="<?= base_url('admin/edit'); ?>">
          <?php elseif ($this->session->userdata('nik')) : ?>
            <a class="nav-link" href="<?= base_url('user/edit'); ?>">
            <?php endif; ?>
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Edit Profile</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link logout" href="<?= base_url('auth/logout'); ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
      

    </ul>
    <!-- End of Sidebar -->