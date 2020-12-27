<?php
$konek = mysqli_connect("localhost", "root", "", "cucisepatu");

if (mysqli_connect_error()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
error_reporting(0);
// echo "Koneksi Berhasil";
