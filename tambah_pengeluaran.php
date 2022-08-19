<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">Catat Pengeluaran</h6>
        </div>
        <div class="card-body">
            <form action='' name='kirim' method='post'>
                <div class="row">
                    <div class="col-sm-4">
                        <label>Pengeluaran:</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Nama Pengeluaran" aria-label=".form-control-sm example" name='nama' required>
                    </div>
                    <div class="col-sm-4">
                        <label>Harga:</label>
                        <input class="form-control form-control-sm" type="number" placeholder="Harga" aria-label=".form-control-sm example" name='harga' required>
                    </div>
                    <div class="col-sm-4">
                        <label>Tanggal Lahir:</label>
                        <input class="form-control form-control-sm" type="date" aria-label=".form-control-sm example" name='date' required>
                    </div>
                    <div class="col-sm-4">
                        <br>
                        <label>Keterangan:</label>
                        <input class="form-control form-control-sm" type="text" value="-" aria-label=".form-control-sm example" name='keterangan' required>
                    </div>
                </div>
                <button type="submit" class="btn btn-info btn-lg btn-block mt-4" name='kirim'>Kirim</button>
            </form>

            <?php
            if (isset($_POST['kirim'])) {
                $nama = htmlspecialchars($_POST['nama']);
                $harga = htmlspecialchars($_POST['harga']);
                $date = htmlspecialchars($_POST['date']);
                $keterangan = $_POST['keterangan'];

                $query = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE nama ='$nama'");


                $insert = mysqli_query($koneksi, "INSERT INTO pengeluaran VALUES (NULL,'$nama','$harga','$date', '$keterangan')");

                if ($insert) {
                    echo "<a class='btn btn-secondary btn-lg btn-block mt-4' href='index.php?page=list_pengeluaran'>Lihat Daftar Pengeluaran</a>";
                    echo "<div class='col-md-11 col-sm-12 col-xs-12'>";
                    echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
                    echo "<p><center>Data Berhasil Masuk</center></p>";
                    echo   "</div>";
                    echo "</div>";
                } else {
                    echo "<div class='col-md-10 col-sm-12 col-xs-12'>";
                    echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                    echo "<p><center>Data Gagal Masuk</center></p>";
                    echo   "</div>";
                    echo "</div>";
                }
            }
            ?>

        </div>
    </div>
</div>