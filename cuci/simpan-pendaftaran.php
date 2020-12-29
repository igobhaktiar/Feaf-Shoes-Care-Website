<?php
//Include file koneksi ke database
include "koneksi/koneksi.php";

//menerima nilai dari kiriman form pendaftaran
$username=$_POST["username"];
$nama=$_POST["nama"];
$alamat=$_POST["alamat"];
$email=$_POST["email"];
$no_hp=$_POST["no_hp"];
$password=$_POST["password"];


//Query input menginput data kedalam tabel anggota
  $sql="insert into tb_pelanggan (username,nama_pelanggan,alamat,email,no_telepon,password) values
		('$username','$nama','$alamat','$email','$no_hp','$password')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($konek,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
	echo "Berhasil simpan data anggota";
	header("location:login.php");
	
  }
else {
	echo "Gagal simpan data anggota";
	exit;
}  

?>