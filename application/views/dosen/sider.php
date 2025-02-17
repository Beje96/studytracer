  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('assets/template/back') ?>/index3.html" class="brand-link">
      <img src="<?= base_url('assets/frontend/img') ?>/logo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Tracer Study IKA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/template/back') ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Halo <?= $this->session->userdata('nama_depan') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>
                Dashboard
              </p>
            </a>
            </li>
            <li class="nav-item">
                    <a href="<?= base_url('backend/dataalumni') ?>" class="nav-link">
                    <i class="nav-icon fas fa-user-graduate"></i>
                    <p>
                     Data Alumni
                    </p>
              </a>
              </li>
              <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>
                     Input Loker
                    </p>
              </a>
              </li> -->
              <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-search-plus"></i>
                    <p>
                    Survei
                    </p>
              </a>
              </li>
              <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>
                    Hasil Survei
                    </p>
              </a>
              </li>
              <li class="nav-item">
                    <a href="<?= base_url('backend/datapanitia/ubahpassword')?>" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                    Ubah Password
                    </p>
              </a>
              </li>
              <li class="nav-item">
                    <a href="<?= base_url('login/logout') ?>" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>
                     Log out
                    </p>
              </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>