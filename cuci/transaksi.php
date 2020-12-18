<?php
include "koneksi/koneksi.php";
session_start();

if (empty($_SESSION['nama'])) {
    echo "<script>alert('Silahkan Login!');location='login.php'</script>";
}
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
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

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
    <div class="container-fluid biru mt-5 mb-5">
        <div class="row">
            <div class="col kotak">
                <img src="images/logo.png" alt="">
            </div>
            <div class="col">
                <form action="transaksi_aksi.php?xaksi=tambah" method="post">

                    <button type="button" id="btn-tambah-form" class="btn btn-danger btn-sm">Tambah Form</button>
                    <button type="button" id="btn-reset-form" class="btn btn-outline-secondary btn-sm">Reset Form</button><br><br>

                    <b>Barang ke 1 :</b>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Jenis Barang</td>
                                <td><select class="form-control" name="xid_barang[]" id="id_barang" required>
                                        <option value="">-----Pilih Barang-----</option>
                                        <?php
                                        $sql = mysqli_query($konek, "select * from tb_barang");
                                        while ($d = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <option value="<?= $d['id_barang']; ?>"><?= $d['nama_barang']; ?></option>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Threatment</td>
                                <td><select class="form-control" name="xid_treatment[]" id="id_treatment" required>
                                        <option value="">-----Pilih Treatment-----</option>
                                        <?php
                                        $sqla = mysqli_query($konek, "select * from tb_treatment");
                                        while ($da = mysqli_fetch_assoc($sqla)) {
                                        ?>
                                            <option value="<?= $da['id_treatment']; ?>"><?= $da['nama_treatment']; ?> - <?= $da['harga_treatment']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td><input class="form-control" type="text" name="xjumlah[]" id="" required></td>
                            </tr>
                        </tbody>
                    </table>

                    <div id="insert-form"></div>

                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Pilih Lokasi</td>
                                <td>
                                    <select class="form-control" name="xid_ongkir" id="xid_ongkir" required>
                                        <option value="">-----Pilih Lokasi-----</option>
                                        <?php
                                        $sql = mysqli_query($konek, "select * from tb_ongkir");
                                        while ($d = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <option value="<?= $d['id_ongkir']; ?>"><?= $d['alamat']; ?> - <?= $d['harga_ongkir']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Pilih Promo</td>
                                <td>
                                    <select class="form-control" name="xid_promo" id="xid_promo" required>
                                        <option value="">-----Pilih Promo-----</option>
                                        <?php
                                        $sql = mysqli_query($konek, "select * from tb_promo");
                                        while ($d = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <option value="<?= $d['id_promo']; ?>"><?= $d['nama_promo']; ?> - <?= $d['diskon']; ?>%</option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat Jemput</td>
                                <td><textarea class="form-control" name="xjemput" id="xjemput" cols="10" rows="3" required></textarea></td>
                            </tr>
                            <tr>
                                <td>Alamat Diantar</td>
                                <td><textarea class="form-control" name="xantar" id="xantar" cols="10" rows="3" required></textarea></td>
                            </tr>
                            <tr>
                                <td>Pesan (Opsional)</td>
                                <td><textarea class="form-control" name="xpesan" id="xpesan" cols="10" rows="3"></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <button type="submit" name="btn" class="btn btn-outline-success btn-sm">Cuci Sekarang</button>
                </form>

                <input type="hidden" id="jumlah-form" value="1">

            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script>
        $(document).ready(function() { // Ketika halaman sudah diload dan siap
            $("#btn-tambah-form").click(function() { // Ketika tombol Tambah Data Form di klik
                var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
                var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

                // Kita akan menambahkan form dengan menggunakan append
                // pada sebuah tag div yg kita beri id insert-form
                $("#insert-form").append("<b>Barang ke " + nextform + " :</b>" +
                    `<table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Jenis Barang</td>
                                <td><select class="form-control" name="xid_barang[]" id="id_barang" required>
                                        <option value="">-----Pilih Barang-----</option>
                                        <?php
                                        $sql = mysqli_query($konek, "select * from tb_barang");
                                        while ($d = mysqli_fetch_assoc($sql)) {
                                        ?>
                                            <option value="<?= $d['id_barang']; ?>"><?= $d['nama_barang']; ?></option>
                                        <?php } ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <td>Threatment</td>
                                <td><select class="form-control" name="xid_treatment[]" id="id_treatment" required>
                                        <option value="">-----Pilih Treatment-----</option>
                                        <?php
                                        $sqla = mysqli_query($konek, "select * from tb_treatment");
                                        while ($da = mysqli_fetch_assoc($sqla)) {
                                        ?>
                                            <option value="<?= $da['id_treatment']; ?>"><?= $da['nama_treatment']; ?> - <?= $da['harga_treatment']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td><input class="form-control" type="text" name="xjumlah[]" id="" required></td>
                            </tr>
                        </tbody>
                    </table>` +
                    "<br>");

                $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
            });

            // Buat fungsi untuk mereset form ke semula
            $("#btn-reset-form").click(function() {
                $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
                $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
            });
        });
    </script>

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