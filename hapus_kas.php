<?php
include_once("function/koneksi.php");

$get_id = $_GET['id'];

$ambil_id = mysqli_query($koneksi, "SELECT * FROM kas WHERE id = '$get_id'");
$ambil_nama = mysqli_fetch_array($ambil_id);
$nama = $ambil_nama['nama'];

$ambil_id_anggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE nama  = '$nama'");

$ambil_id_anggota2 = mysqli_fetch_array($ambil_id_anggota);

$id_anggota = $ambil_id_anggota2['id'];

$delete = mysqli_query($koneksi, "DELETE FROM kas WHERE id = '".$_GET['id']."'");

if($delete) {	
	header('location: index.php?page=daftar_kas&hapus=sukses');
}else {
	header('location: index.php?page=daftar_kas&hapus=gagal');
}
