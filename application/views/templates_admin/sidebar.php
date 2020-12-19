<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('penjualan/hal_penjualan') ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CV. Muara Mandiri</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('penjualan/hal_penjualan/')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- pesanan -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('penjualan/transaksi')?>">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Kelola Pesanan</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('penjualan/pesanan_khusus')?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Kelola Pesanan Khusus</span></a>
      </li>

      <!-- Nav Item - Menu Kelola Produk -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produk" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-box"></i>
          <span>Kelola Produk</span>
        </a>
        <div id="produk" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('penjualan/produk')?>">
              <i class="fas fa-fw fa-table"></i>
              <span> Data Produk</span>
            </a>
            <a class="collapse-item" href="<?php echo base_url('penjualan/produk/tambah')?>">
              <i class="fas fa-fw fa-plus"></i>
              <span> Tambah Data Produk</span>
            </a>
            <a class="collapse-item" href="<?php echo base_url('penjualan/kategori')?>">
              <i class="fas fa-fw fa-tags"></i>
              <span> Kategori Produk</span>
            </a>
          </div>
        </div>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('penjualan/rekening')?>">
          <i class="fas fa-fw fa-dollar-sign"></i>
          <span>Data Rekening</span></a>
      </li> -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengguna" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-user"></i>
          <span>Kelola User (Pegawai)</span>
        </a>
        <div id="pengguna" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('penjualan/user')?>">
              <i class="fas fa-fw fa-table"></i>
              <span> Data User (Pegawai)</span>
            </a>
            <a class="collapse-item" href="<?php echo base_url('penjualan/user/tambah')?>">
              <i class="fas fa-fw fa-plus"></i>
              <span> Tambah Data User (Pegawai)</span>
            </a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('penjualan/pelanggan')?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Pelanggan</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('penjualan/transaksi/laporan')?>">
          <i class="fas fa-fw fa-file"></i>
          <span>Laporan</span></a>
      </li>

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#konfigurasi" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Konfigurasi</span>
        </a>
        <div id="konfigurasi" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url('penjualan/konfigurasi')?>">
              <i class="fas fa-fw fa-home"></i>
              <span> Konfigurasi Umum</span>
            </a>
            <a class="collapse-item" href="<?php echo base_url('penjualan/konfigurasi/logo')?>">
              <i class="fas fa-fw fa-image"></i>
              <span> Konfigurasi Logo</span>
            </a>
            <a class="collapse-item" href="<?php echo base_url('penjualan/konfigurasi/icon')?>">
              <i class="fas fa-fw fa-home"></i>
              <span> Konfigurasi Icon</span>
            </a>
          </div>
        </div>
      </li> -->
      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/data_barang')?>">
          <i class="fas fa-fw fa-box"></i>
          <span>Data Barang</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none"></div>

            <ul class="na navbar-nav navbar-right">
              <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small text-right">
                  <?php echo $this->session->userdata('nama')?><br>
                  Bagian <?php echo $this->session->userdata('role_id')?>
                </span>
                <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
                <i class="fas fa-user-circle fa-2x"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url('login/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
            </ul>
          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin untuk Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tekan Logout untuk Keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url('login/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>