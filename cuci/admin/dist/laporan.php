<?php
session_start();
if ($_SESSION['status'] != "Login") {
    # code...
    header("location:login.php?pesan=belum_login");
  }
  include "koneksi.php"
?>
<?php 

if (isset($_POST['submit'])) {
 $bln = date($_POST['bulan']);

 if (!empty($bln)) {
  // perintah tampil data berdasarkan periode bulan
  $q = mysqli_query($konek, "SELECT * FROM tb_transaksi WHERE MONTH(tanggal_transaksi) = '$bln'");
 } else {
  // perintah tampil semua data
  $q = mysqli_query($konek, "SELECT * FROM tb_transaksi");
 }
} else {
 // perintah tampil semua data
 $q = mysqli_query($konek, "SELECT * FROM tb_transaksi");
}

// hitung jumlah baris data
$s = $q->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
  <?php include "navbar.php"?>
  
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Laporan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Laporan</li>
                    </ol>
                    <!-- table -->
                    <div class="container mt-5">
                        <div class="card col-md-12 mx-auto mt-7">
                        <div class="card-body">
                          <div class="row">
                          <div class="col-md-4 pt-2">
                            <span>Jumlah data: <b><?= $s ?></b></span>
                          </div>
                          <div class="col-md-8 ">
                            <form method="POST" action="" class="form-inline">
                            <label for="date1">Tampilkan transaksi bulan </label>
                            <select class="form-control mr-2" name="bulan">
                              <option value="">-</option>
                              <option value="1">Januari</option>
                              <option value="2">Februari</option>
                              <option value="3">Maret</option>
                              <option value="4">April</option>
                              <option value="5">Mei</option>
                              <option value="6">Juni</option>
                              <option value="7">Juli</option>
                              <option value="8">Agustus</option>
                              <option value="9">September</option>
                              <option value="10">Oktober</option>
                              <option value="11">November</option>
                              <option value="12">Desember</option>
                            </select>
                            <button type="submit" name="submit" class="btn btn-primary">Tampilkan</button>
                            </form>
                          </div>
                          </div>
                          <?php
                          $query = $konek->query("SELECT t.id_pelanggan,p.nama_pelanggan,t.status,t.total FROM tb_transaksi t INNER JOIN tb_pelanggan p ON t.id_pelanggan=p.id_pelanggan ");
                          ?>
                          <div class="mt-3" style="max-height: 400px; overflow-y: auto;">
                          <table class="table table-bordered">
                            <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Pengantaran</th>
                            <th>Penjemputan</th>
                            <th>Total</th>
                            <th>Keterangan</th>
                            <th>Tgl. Transaksi</th>
                            </tr>

                            <?php
                            
                            $no = 1;
                            $q = mysqli_query($konek, "SELECT * FROM tb_transaksi t INNER JOIN tb_pelanggan p ON t.id_pelanggan=p.id_pelanggan WHERE t.id_pelanggan='1' ");
                            while ($r = $q->fetch_assoc()) {
                            ?>

                            <tr>
                            <td><?= $no++ ?></td>
                            <td><?=($r['nama_pelanggan']) ?></td>
                            <td><?=($r['status']) ?></td>
                            <td><?=($r['pengantaran']) ?></td>
                            <td><?= $r['penjemputan'] ?></td>
                            <td><?= $r['total'] ?></td>
                            <td><?=$r['keterangan']?></td>
                            <td><?= date('d-M-Y', strtotime($r['tanggal_transaksi'])) ?></td>
                            </tr>
                        
                            <?php   
                            }
                            ?>

                          </table>
                          </div>
                        </div>
                        </div>
                      </div>
                    <!-- end of table -->
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>
</html>
