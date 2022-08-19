<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">Data Pemasukan Kas</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">

            <div class="row mt-3">
                <div class="col-md-8  mt-4">
                    <a href="export_kas.php" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm mt-1"><i class="fas fa-download fa-sm text-white-50"></i> Buat Laporan</a>
                    <a href="kas_json.php" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm mt-1"><i class="fas fa-download fa-sm text-white-50"></i> JSON</a>
                </div>

                <div class="col-md-4 mt-3 ">
                    <form class="form-inline my-2 my-lg-0" action="search_kas.php" method="get" name='cari'>
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name='cari' required>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>

            <?php
            $list = mysqli_query($koneksi, "SELECT * FROM kas");
            if (mysqli_num_rows($list) == 0) {
                //jika tidak ada
                echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
                echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                echo "<p><center>Data Masih Kosong</center></p>";
                echo "</div>";
                echo "</div>";
            } else {
            ?>

                <?php
                if (isset($_GET['cari'])) {
                    $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
                    $query_cari = mysqli_query($koneksi, "SELECT * FROM kas where id like '%" . $cari . "%' or nama like '%" . $cari . "%'");

                    if (mysqli_num_rows($query_cari) > 0) {
                        echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
                        echo "<div class='alert alert-info mt-4 ml-5' role='alert'>";
                        echo "<p><center>Hasil pencarian dengan kata '$cari' ditemukan</center></p>";
                        echo   "</div>";
                        echo "</div>";
                    } else {
                        echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
                        echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                        echo "<p><center>Hasil pencarian dengan kata '$cari' tidak ditemukan</center></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                } else {
                    $query_cari = mysqli_query($koneksi, "select * from kas");
                } ?>

                <div class="table-responsive service">
                    <table class="table table-bordered table-hover  mt-3 text-nowrap css-serial">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Anggota</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Tanggal Setor</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <?php
                        $no = 1;

                        //untuk menampilkan list data

                        if (mysqli_num_rows($query_cari)) {
                            while ($row = mysqli_fetch_array($query_cari)) {

                        ?>
                                <tbody>
                                    <tr>
                                        <th scope="row"><?php echo $row['id'] ?></th>
                                        <td><?php echo $row['nama'] ?></td>
                                        <td><?php echo number_format($row['jumlah']) ?></td>
                                        <td><?php echo $row['tanggal'] ?></td>
                                        <td><a href="index.php?page=edit_kas&id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-info">Edit</button></a>
                                            <a href="hapus_kas.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                        </td>


                                    </tr>
                                </tbody>
                    <?php
                                $no++;
                            }
                        } elseif (mysqli_num_rows($query_cari) <= 0 and !$cari) {
                            echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
                            echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                            echo "<p><center>Data Masih Kosong</center></p>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                    ?>
                    </table>
                </div>

        </div>
    </div>
</div>