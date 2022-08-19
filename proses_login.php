<?php

include 'function/koneksi.php';
$username   = $_POST['username'];
$pass       = $_POST['password'];

$user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$pass'");
$query = mysqli_num_rows($user);
if ($query > 0) {
    session_start();
    $row = mysqli_fetch_array($user);
    $_SESSION['password'] = $row['password'];
    header("location: index.php");
} else {
    header("location: login.php?notif=gagal");
}
