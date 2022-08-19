<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "manajemen_kas";

$koneksi = mysqli_connect($server, $username, $password, $database) or die("koneksi ke database gagal");
