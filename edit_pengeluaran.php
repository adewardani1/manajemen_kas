<?php
$id_kas = $_GET['id'];
$query_id = mysqli_query($koneksi, "SELECT * FROM pengeluaran WHERE id='$id_kas'");
while ($query = mysqli_fetch_array($query_id)) {
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-info">Edit Kas</h6>
            </div>
            <!-- Card Body -->


            <div class="row ml-5 mb-2 mt-3">

                <form method="POST" name="edit">
                    <table class="table mt-3 text-nowrap css-serial">
                        <tr>
                            <td><b>Nama Pengeluaran </b></td>
                            <td><b><?php echo $query['nama'] ?></b></td>
                        </tr>
                        <tr>
                            <td><b>Jumlah Kas</b></td>
                            <td><input type="number" name="jumlah" value="<?php echo $query['jumlah']; ?>" requireds /></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Setor</b></td>
                            <td><input type="date" name='tanggal' value="<?php echo $query['tanggal']; ?>" required></td>
                        </tr>
                        <tr>
                            <td><b>Keterangan</b></td>
                            <td><input type="text" name="keterangan" value="<?php echo $query['keterangan']; ?>" requireds /></td>
                        </tr>

                    </table>
                    <br>
                    <button type="submit" class="btn btn-info" name='edit'>Update</button>&nbsp;<input type="reset" class="btn btn-danger" value="Reset">
                    <br><br>
                </form>

            <?php
        }
            ?>

            <?php

            if (isset($_POST['edit'])) {
                $jumlah = htmlspecialchars($_POST['jumlah']);
                $tanggal = htmlspecialchars($_POST['tanggal']);
                $keterangan = htmlspecialchars($_POST['keterangan']);

                $edit = mysqli_query($koneksi, "UPDATE pengeluaran SET jumlah = '$jumlah', tanggal = '$tanggal', keterangan = '$keterangan' 
    WHERE id = '" . $_GET['id'] . "' ");

                if ($edit) {

            ?>

                    <script language="JavaScript">
                        document.location.href = 'index.php?page=list_pengeluaran';
                    </script>

            <?php

                    // echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
                    // echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
                    // echo "<p><center>Mengedit Data Sukses</center></p>";
                    // echo   "</div>";
                    // echo "</div>";

                } else {
                    echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5'>";
                    echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                    echo "<p><center>Mengedit Data Gagal</center></p>";
                    echo   "</div>";
                    echo "</div>";
                }
            }

            ?>

            </div>
        </div>
    </div>
    </div>