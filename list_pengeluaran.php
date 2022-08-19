<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-info">Data Pengeluaran Kas</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">

            <div class="row mt-3">
                <div class="col-md-8  mt-4">
                    <a href="export_pengeluaran.php" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm mt-1"><i class="fas fa-download fa-sm text-white-50"></i> Buat Laporan</a>
                </div>

            </div>

            <div class="table-responsive service">

                <table class="table table-bordered table-hover  mt-3 text-nowrap css-serial">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama Pengeluaran</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Tanggal Pengeluaran</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <?php
                    $brg = mysqli_query($koneksi, "SELECT * FROM pengeluaran");
                    if (mysqli_num_rows($brg)) {
                        while ($row = mysqli_fetch_array($brg)) {
                    ?>

                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $row['id'] ?></th>
                                    <td><?php echo $row['nama'] ?></td>
                                    <td><?php echo number_format($row['jumlah']) ?></td>
                                    <td><?php echo $row['tanggal'] ?></td>
                                    <td><?php echo $row['keterangan'] ?></td>
                                    <td><a href="index.php?page=edit_pengeluaran&id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-info">Edit</button></a>
                                        <a href="hapus_pengeluaran.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
                                    </td>


                                </tr>
                            </tbody>
                    <?php }
                    } elseif (mysqli_num_rows($brg) <= 0) {
                        echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
                        echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                        echo "<p><center>Data Masih Kosong</center></p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </table>

            </div>
        </div>
    </div>
</div>