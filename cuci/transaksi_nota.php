<?php
include "koneksi/koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Feaf Shoes Care</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>

<body>
    <?php
    include "sidebar.php";
    ?>
    <div class="container">
        <div class="row">
            <div class="col" style="text-align: center;">
                <h2>Nota Transaksi</h2>
            </div>
        </div>
        <div class="row" style="border:1px solid black">
            <?php
            $id = $_GET['id'];
            $sql = mysqli_query($konek, "SELECT * FROM tb_transaksi t INNER JOIN tb_pelanggan p ON t.id_pelanggan=p.id_pelanggan INNER JOIN tb_ongkir o ON t.id_ongkir=o.id_ongkir WHERE t.id_transaksi='$id' ");
            
            $d = mysqli_fetch_assoc($sql);
            ?>

            <div class="col">
                <b>No Pesanan : <?= $d['id_transaksi']; ?></b> <br>
                Tanggal Pemesanan : <?= $d['tanggal_transaksi']; ?> <br>
                Total : Rp <?= number_format($d['total']); ?>
            </div>
            <div class="col">
                <b> Pelanggan</b> <br>
                Nama Pelanggan : <?= $d['nama_pelanggan']; ?> <br>
                No Telepon : <?= $d['no_telepon']; ?> <br>
            </div>
            <div class="col">
                <b>Alamat</b> <br>
                Kab. / Kota : <?= $d['alamat']; ?> <br>
                Tarif Ongkir : Rp <?= number_format($d['harga_ongkir']); ?> <br>
            </div>
        </div>

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

        <div class="row">
            <div class="col-sm-7">
                <div class="alert alert-primary">
                    Lakukan pembayaran dengan cara transfer ke no rekening <strong>BRI 123-889999-343 AN. Novi Eka </strong>
                    Total Rp <?= number_format($grandtotal) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="overlay"></div>

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
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
    <script>
        // This example adds a marker to indicate the position of Bondi Beach in Sydney,
        // Australia.
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                center: {
                    lat: 40.645037,
                    lng: -73.880224
                },
            });

            var image = 'images/maps-and-flags.png';
            var beachMarker = new google.maps.Marker({
                position: {
                    lat: 40.645037,
                    lng: -73.880224
                },
                map: map,
                icon: image
            });
        }
    </script>
</body>

</html>