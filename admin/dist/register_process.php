<?php
include "koneksi.php";
if (isset($_POST['submit'])) {
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat = $_POST['alamat'];
$kelamin = $_POST['kelamin'];
$level = $_POST['level'];

$query = mysqli_query($konek,"insert into tb_petugas values ('','$nama','$username','$password','$alamat','$kelamin','$level')");
header("location:login.php?pesan=input berhasil");
}

?>