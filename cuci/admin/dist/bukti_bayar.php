<?php
session_start();
if ($_SESSION['status'] != "Login") {
    # code...
    header("location:login.php?pesan=belum_login");
  }
  include "koneksi.php"
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Cuci Sepatu</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
        <?php include "./navbar.php" ?>
        
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Edit Promo</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Promo</li>
                        </ol>
                    </div>
                    
                    <table class="table table-striped">
                        <h1 align=center >Detail Transaksi</h1>
                        <?php
            $id = $_GET['id'];
            $sql = mysqli_query($konek, "SELECT * FROM tb_transaksi t INNER JOIN tb_pelanggan p ON t.id_pelanggan=p.id_pelanggan INNER JOIN tb_ongkir o ON t.id_ongkir=o.id_ongkir INNER JOIN tb_promo a ON t.id_promo=a.id_promo WHERE t.id_transaksi='$id' ");
            $d = mysqli_fetch_assoc($sql);
            ?>
            <tr>
                <td>No Pesanan</td>
                <td>:</td>
                <td><?= $d['id_transaksi']; ?></td>
            </tr>
            <tr>
                <td>Promo</td>
                <td>:</td>
                <td><?= $d['nama_promo']; ?></td>
            </tr>
            <tr>
                <td>Tanggal Pemesanan</td>
                <td>:</td>
                <td> <?= $d['tanggal_transaksi']; ?></td>
            </tr>
            <tr>
                <td>Nama Pelanggan</td>
                <td>:</td>
                <td> <?= $d['nama_pelanggan']; ?> </td>
            </tr>
            <tr>
                <td>Pengantaran</td>
                <td>:</td>
                <td><?= $d['pengantaran']; ?></td>
            </tr>
            <tr>
                <td>Penjemputan</td>
                <td>:</td>
                <td><?= $d['penjemputan']; ?></td>
            </tr>
             <tr>
                <td>Tarif ongkir</td>
                <td>:</td>
                <td>Rp <?= number_format($d['harga_ongkir']); ?></td>
            </tr>
            <tr>
                <td><img src="images/bukti_bayar/<?= $d['bukti_bayar']; ?>" class="img-fluid mb-3"></td>
                </tr>
            

        <div class="row mt-1">
            <table class="table table-bordered">
                <thead>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Treatment</th>
                    <th>Harga Treatment</th>
                    <th>Jumlah</th>
                    <th>subtotal</th>
                </thead>
                <tbody>
                    <?php
                    $id = $_GET['id'];
                    $no = 1;
                    $sqli = mysqli_query($konek, "SELECT * FROM tb_detail_transaksi d INNER JOIN tb_barang b ON d.id_barang=b.id_barang INNER JOIN tb_treatment r ON d.id_treatment=r.id_treatment WHERE d.id_transaksi='$id'");
                    while ($da = mysqli_fetch_assoc($sqli)) {
                        $subtotal = $subtotal + $da['subtotal'];
                    ?>

                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $da['nama_barang'] ?></td>
                            <td><?= $da['nama_treatment'] ?></td>
                            <td>Rp <?= number_format($da['harga_treatment']) ?></td>
                            <td><?= $da['jumlah'] ?></td>
                            <td>Rp <?= number_format($da['subtotal']) ?></td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <?php
                        $grandtotal = $subtotal + $d['harga_ongkir']
                        ?>
                        <td colspan="5" align="right">Grand Total : </td>
                        <td><b>Rp <?= number_format($grandtotal) ?></b></td>
                    </tr>
                </tfoot>
            </table>  
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>