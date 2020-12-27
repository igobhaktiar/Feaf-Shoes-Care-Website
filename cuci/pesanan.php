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
                <h2>Pesanan</h2>
            </div>
        </div>
        <div class="row mt-1">
            <table class="table table-bordered">
                <thead>
                    <th>No</th>
                    <th>Tanggal Pesan</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    <?php
                    $id_pelanggan = $_SESSION['idpelanggan'];
                    $no = 1;
                    $sql = mysqli_query($konek, "SELECT * FROM tb_transaksi WHERE id_pelanggan='$id_pelanggan' ");
                    while ($da = mysqli_fetch_assoc($sql)) {
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= date('d - m - Y', strtotime($da['tanggal_transaksi'])) ?></td>
                            <td><?= $da['status'] ?></td>
                            <td>Rp <?= number_format($da['total']) ?></td>
                            <td width="200px"> <?php if ($da['status'] == 'pesan') { ?>
                                    <a href="transaksi_bayar.php?id=<?= $da['id_transaksi']; ?>" class="btn btn-outline-primary btn-sm">Bayar</a>
                                <?php } else if ($da['status'] == 'bayar') { ?>
                                    <b>Anda Sudah Bayar</b>
                                    <a href="dt.php?id=<?= $da['id_transaksi']; ?>" class="btn btn-outline-success btn-sm">Rincian Pesanan</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>

            </table>
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