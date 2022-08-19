<?php
$pass = $_SESSION['password'];
$cari = mysqli_query($koneksi, "SELECT * FROM user WHERE password = '$pass'");
$cari_profile = mysqli_fetch_array($cari);
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-1">
        </div>
        <div class="col-xl-10 col-lg-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-info"><b>User Profile</b></h6>
                </div>
                <div class="card-body">
                    <center><img class="mt-2" src="img/<?php echo $cari_profile['foto'] ?>" alt="Profile" width="300" height="320px"></center>
                    <p><b>
                            <center>Nama : <?php echo $cari_profile['nama']; ?></center>
                        </b></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->