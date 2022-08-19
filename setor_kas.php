<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">Setor Uang Kas</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">

            <form action='' name='kirim' method='post'>

                <div class="row">

                    <div class="col-sm-4">
                        <label>Nama Anggota:</label>
                        <select class="form-control" name='nama' required>
                            <option selected disabled value="">Nama Anggota</option>

                            <?php
                            $brg = mysqli_query($koneksi, "SELECT * FROM anggota");
                            while ($b = mysqli_fetch_array($brg)) {
                            ?>

                                <option value="<?php echo $b['nama']; ?>"><?php echo $b['nama']; ?></option>

                            <?php } ?>
                        </select>
                    </div>

                    <div class="col-sm-4">
                        <label>Uang Kas:</label>
                        <input class="form-control form-control-sm" type="number" placeholder="Jumlah Uang..." aria-label=".form-control-sm example" name='jumlah' required>
                    </div>

                    <div class="col-sm-4">
                        <label>Tanggal Setor:</label>
                        <input class="form-control form-control-sm" type="date" aria-label=".form-control-sm example" name='date' required>
                    </div>

                </div>
                <button type="submit" class="btn btn-info btn-lg btn-block mt-4" name='kirim'>Kirim</button>

            </form>

            <?php

            if (isset($_POST['kirim'])) {
                $nama = htmlspecialchars($_POST['nama']);
                $jumlah = htmlspecialchars($_POST['jumlah']);
                $date = htmlspecialchars($_POST['date']);

                $query_nama = mysqli_query($koneksi, "SELECT * FROM kas WHERE nama ='$nama'");
                $query = mysqli_num_rows($query_nama);
                $insert = mysqli_query($koneksi, "INSERT INTO kas VALUES (NULL,'$nama','$jumlah','$date')");

                if ($insert) {
                    echo "<a class='btn btn-secondary btn-lg btn-block mt-4' href='index.php?page=daftar_kas'>Lihat Daftar Kas</a>";
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