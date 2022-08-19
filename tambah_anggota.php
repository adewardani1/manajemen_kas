<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">Tambah Anggota</h6>
        </div>
        <div class="card-body">
            <form action='' name='kirim' method='post'>
                <div class="row">
                    <div class="col-sm-4">
                        <label>Nama Anggota:</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Nama Anggota" aria-label=".form-control-sm example" name='nama' required>
                    </div>
                    <div class="col-sm-4">
                        <label>Alamat:</label>
                        <input class="form-control form-control-sm" type="text" placeholder="Alamat" aria-label=".form-control-sm example" name='alamat' required>
                    </div>
                    <div class="col-sm-4">
                        <label>Tanggal Lahir:</label>
                        <input class="form-control form-control-sm" type="date" aria-label=".form-control-sm example" name='date' required>
                    </div>
                </div>
                <button type="submit" class="btn btn-info btn-lg btn-block mt-4" name='kirim'>Kirim</button>
            </form>

            <?php
            if (isset($_POST['kirim'])) {
                $nama = htmlspecialchars($_POST['nama']);
                $alamat = htmlspecialchars($_POST['alamat']);
                $date = htmlspecialchars($_POST['date']);

                $query = mysqli_query($koneksi, "SELECT * FROM anggota WHERE nama ='$nama'");

                $insert = mysqli_query($koneksi, "INSERT INTO anggota VALUES (NULL, '$nama', '$alamat', '$date')");

                if ($insert) {
                    echo "<a class='btn btn-secondary btn-lg btn-block mt-4' href='index.php?page=list_anggota'>Lihat Daftar Anggota</a>";
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