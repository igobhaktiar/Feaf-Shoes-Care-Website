<?php
include "koneksi.php";

if (isset($_POST['tambah'])) {
$id = $_POST['id'];
$nama = $_POST['nama'];
$diskon = $_POST['diskon'];

$query = mysqli_query($konek,"update tb_promo set nama_promo='$nama', diskon='$diskon' where id_promo='$id'");
header("location:promo.php?pesan=input berhasil");
}

?>