<?php
    include_once("function/koneksi.php");
    $delete = mysqli_query($koneksi, "DELETE FROM anggota WHERE id = '".$_GET['id']."'");

    if($delete){
	    header('location: index.php?page=list_anggota&hapus=sukses');
    }else{
		header('location: index.php?page=list_anggota&hapus=gagal');
    }

?>
