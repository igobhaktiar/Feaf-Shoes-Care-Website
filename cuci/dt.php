<?php
include "koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>transaksi</title>
    <link rel="stylesheet" href="css/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->

</head>

<body>

    <?php include "./sidebar.php" ?>

    <div class="contactus">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="title">
                        <h2>Transaksi</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid biru">
        <div class="row">
            <div class="col">
                
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
                <td>Keterangan</td>
                <td>:</td>
                <td><?= $d['keterangan']; ?></td>
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
        </div>

    </div>
                    </table>
                    <hr>
                
                <br>

                <input type="hidden" id="jumlah-form" value="1">
                
                                        
            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function() {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });

        });
    </script>
    <!--  footer -->
    <?php include "./footer.php" ?>
    <!-- end footer -->


</body>

</html>