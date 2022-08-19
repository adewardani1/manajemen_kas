<?php
$id_anggota = $_GET['id'];
$query_id = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id='$id_anggota'");
while ($query = mysqli_fetch_array($query_id)) {
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-info">Edit Anggota</h6>
            </div>
            <!-- Card Body -->


            <div class="row ml-5 mb-2 mt-3">

                <form method="POST" name="edit">
                    <table class="table mt-3 text-nowrap css-serial">
                        <tr>
                            <td><b>Nama Anggota </b></td>
                            <td><input type="text" name="nama" value="<?php echo $query['nama']; ?>" requireds /></td>
                        </tr>
                        <tr>
                            <td><b>Alamat</b></td>
                            <td><input type="text" name="alamat" value="<?php echo $query['alamat']; ?>" requireds /></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Lahir</b></td>
                            <td><input type="date" name='date' value="<?php echo $query['umur']; ?>" required></td>
                        </tr>
                    </table>
                    <br>
                    <button type="submit" class="btn btn-info" name='edit'>Update</button>&nbsp;<input type="reset" class="btn btn-danger" value="Reset">
                    <br><br>
                </form>
            </div>

        <?php
    }
        ?>

        <?php
        if (isset($_POST['edit'])) {
            $nama = htmlspecialchars($_POST['nama']);
            $alamat = htmlspecialchars($_POST['alamat']);
            $date = htmlspecialchars($_POST['date']);

            $edit = mysqli_query($koneksi, "UPDATE anggota SET nama = '$nama', alamat = '$alamat', umur = '$date' WHERE id = '" . $_GET['id'] . "' ");
            if ($edit) {
        ?>
                <script language="JavaScript">
                    document.location.href = 'index.php?page=list_anggota';
                </script>
        <?php
                // echo "<div class='col-md-4 col-sm-7 col-xs-12 ml-4'>";
                // echo "<div class='alert alert-primary mt-1 ml-2' role='alert'>";
                // echo "<p><center>Mengedit Data Sukses</center></p>";
                // echo   "</div>";
                // echo "</div>";
            } else {
                echo "<div class='col-md-5 col-sm-7 col-xs-12 ml-5'>";
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