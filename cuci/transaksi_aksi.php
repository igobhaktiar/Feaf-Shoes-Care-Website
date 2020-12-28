<?php
include "koneksi/koneksi.php";
session_start();

$aksi = $_GET['xaksi'];

if ($aksi == 'tambah') {
    if (isset($_POST['btn'])) {
        // membuat session array dengan variabel post
        $_SESSION['pos'] = $_POST;
    }
    if (isset($_SESSION['pos'])) {
        $brg = $_SESSION['pos']['xid_barang'];
        $tre = $_SESSION['pos']['xid_treatment'];
        $jml = $_SESSION['pos']['xjumlah'];
        $okr = $_SESSION['pos']['xid_ongkir'];
        $prm = $_SESSION['pos']['xid_promo'];
        $jmp = $_SESSION['pos']['xjemput'];
        $atr = $_SESSION['pos']['xantar'];
        $psn = $_SESSION['pos']['xpesan'];
    } else {
        $psn = '';
    }
    echo "<script>location = 'transaksi_checkout.php'</script>";
}

if ($aksi == 'simpan') {
    $id_pelanggan = $_SESSION['idpelanggan'];
    $id_petugas = 1;
    $id_ongkir = $_SESSION['pos']['xid_ongkir'];
    $id_promo = 1;
    $tgl_transaksi = date("Y-m-d H:i:s");
    $antar = $_SESSION['pos']['xantar'];
    $jemput = $_SESSION['pos']['xjemput'];
    $total = $_GET['total'];
    $keterangan = $_SESSION['pos']['xpesan'];
    $idprm = $_SESSION['pos']['xid_promo'];

    $sqld = mysqli_query($konek, "select * from tb_promo where id_promo='$idprm'");
    $d = mysqli_fetch_assoc($sqld);

    $sql = mysqli_query($konek, "insert into tb_transaksi(id_pelanggan,id_petugas,id_ongkir,id_promo,tanggal_transaksi,pengantaran,penjemputan,total,status,keterangan)
    values ('$id_pelanggan','$id_petugas','$id_ongkir','$id_promo','$tgl_transaksi','$antar','$jemput','$total','pesan','$keterangan')");

    $id_transaksi_barusan = mysqli_insert_id($konek);

    $idbrg = $_SESSION['pos']['xid_barang'];
    $idtre = $_SESSION['pos']['xid_treatment'];
    $jml = $_SESSION['pos']['xjumlah'];
    $i = 0;
    $query = "INSERT INTO tb_detail_transaksi VALUES";
    foreach ($idbrg as $idbr) {
        $sql = mysqli_query($konek, "select * from tb_treatment where id_treatment='$idtre[$i]'");
        $h = mysqli_fetch_assoc($sql);
        if ($d['diskon'] != 0) {
            $diskon = $h['harga_treatment'] * $d['diskon'] / 100;
            $subtotal = $diskon * $jml[$i];
        } else {
            $subtotal = $h['harga_treatment'] * $jml[$i];
        }

        $query .= "('" . NULL . "','" . $id_transaksi_barusan . "','" . $idbrg[$i] . "','" . $idtre[$i] . "','" . $jml[$i] . "','" . $subtotal . "'),";

        $i++;
    }
    $query = substr($query, 0, strlen($query) - 1) . ";";
    mysqli_query($konek, $query);

    unset($_SESSION['pos']);
    echo "<script>location='transaksi_nota.php?id=$id_transaksi_barusan'</script>";
}

if ($aksi == 'bayar') {
    $id = $_GET['id'];
    $gambar = $_FILES['xgambar']['name'];
    $tmpgambar = $_FILES['xgambar']['tmp_name'];

    mysqli_query($konek, "UPDATE tb_transaksi SET bukti_bayar='$gambar',status='bayar' WHERE id_transaksi='$id'");
    copy($tmpgambar, "admin/dist/bukti_bayar/$gambar");
    echo "<script>alert('Anda telah melakukan pembayaran');location='pesanan.php'</script>";
}

if ($aksi == 'sesi') {
    unset($_SESSION['pos']);
    echo "<script>location='transaksi_checkout.php'</script>";
}
