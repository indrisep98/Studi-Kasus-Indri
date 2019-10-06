  <div id="wrapper">  <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url('index.php'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
       <?php
      if($this->session->userdata('level') == 'kasir'){ // Jika role-nya admin
    ?>
     <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('index.php/user'); ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data User</span></a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('index.php/produk'); ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Makanan & Minuman</span></a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('index.php/pemesanan'); ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Pemesanan</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('index.php/auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
        </li>
    <?php
}else{ // Jika role-nya operator
    ?>
   <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('index.php/produk'); ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Makanan & Minuman</span></a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('index.php/pemesanan'); ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Pemesanan</span></a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('index.php/laporanpdf'); ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laporan Penjualan</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('index.php/auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
        </li>
    <?php
}
?>
      </ul>