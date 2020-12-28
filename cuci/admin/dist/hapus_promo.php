<?php
include "koneksi.php";
$id = $_GET['id'];
mysqli_query($konek,"delete from tb_promo where id_promo='$id'");

header("location:promo.php?pesan=berhasil dihapus");
?>