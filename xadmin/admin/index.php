<?php
require_once "header.php";
require_once "../koneksi.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

    <nav aria-label="breadcrumb shadow">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </nav>
  </div>

  <!-- Ringkasan Row -->
  <div class="row">

    <!-- Jenis Layanan -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-80 py-2">
        <div class="card-body">
          <div class="row d-flex align-items-center">
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-secondary"></i>
            </div>
            <div class="col-8">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jenis Layanan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Layanan -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-80 py-2">
        <div class="card-body">
          <div class="row d-flex align-items-center">
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-secondary"></i>
            </div>
            <div class="col-8">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Layanan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Transaksi -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-80 py-2">
        <div class="card-body">
          <div class="row d-flex align-items-center">
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-secondary"></i>
            </div>
            <div class="col-8">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Transaksi</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Total Omset -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-80 py-2">
        <div class="card-body">
          <div class="row d-flex align-items-center">
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-secondary"></i>
            </div>
            <div class="col-8">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sales</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp 2000000</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Member -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-80 py-2">
        <div class="card-body">
          <div class="row d-flex align-items-center">
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-secondary"></i>
            </div>
            <div class="col-8">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Member</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Admin -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-80 py-2">
        <div class="card-body">
          <div class="row d-flex align-items-center">
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-secondary"></i>
            </div>
            <div class="col-8">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">4</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content Row -->

  <div class="row">

  </div>

</div>
<!-- /.container-fluid -->
<?php
require_once "footer.php";
?>