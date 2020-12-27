<?php
include "koneksi.php";

if (isset($_POST['tambah'])) {
$nama = $_POST['nama'];
$diskon = $_POST['diskon'];

$query = mysqli_query($konek,"insert into tb_promo values ('','$nama','$diskon')");
header("location:promo.php?pesan=input berhasil");
}

?>