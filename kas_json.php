<?php
//panggil koneksi database
include_once("function/koneksi.php");

//query tabel Mahasiswa
$sql = "select * from kas";
$tampil = mysqli_query($koneksi, $sql);

//percabangan
if (mysqli_num_rows($tampil) > 0) {
    $no = 1;
    //buat data mahasiswa menjadi array
    $response = array();
    $response["data"] = array();
    //looping data dari query mahasiswa
    while ($r = mysqli_fetch_array($tampil)) {
        $h['id'] = $r['id'];
        $h['nama'] = $r['nama'];
        $h['jumlah'] = $r['jumlah'];
        $h['tanggal'] = $r['tanggal'];
        array_push($response["data"], $h);
    }
    //mengubah data array menjadi data json
    echo json_encode($response);
} else {
    //jika data tidak ada maka akan menampilkan "tidak ada data"
    $response["message"] = "tidak ada data";
    echo json_encode($response);
}
