<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi/koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['xusername'];
$password = $_POST['xpassword'];

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($konek, "select * from tb_pelanggan where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);

	$_SESSION['idpelanggan'] = $data['id_pelanggan'];
	$_SESSION['nama'] = $data['nama_pelanggan'];
	$_SESSION['username'] = $data['username'];
	$_SESSION['password'] = $data['password'];
	header("location:index.php");
} else {
	header("location:index.php?pesan=gagal");
}
