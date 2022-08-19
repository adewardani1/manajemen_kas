<?php
include_once("function/koneksi.php");
$delete = mysqli_query($koneksi, "DELETE FROM pengeluaran WHERE id = '" . $_GET['id'] . "'");

if ($delete) {
  header('location: index.php?page=list_pengeluaran&hapus=sukses');
} else {
  header('location: index.php?page=list_pengeluaran&hapus=gagal');
}
