<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-1">
        </div>
        <!-- Area Chart -->
        <div class="col-xl-10 col-lg-10">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-info">Ubah Nama Dan Foto:</h6>
                </div>

                <?php
                $id = ($_GET['id']);
                $tak = !$id;
                if ($tak) {
                    echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5 mt-5'>";
                    echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                    echo "<p><center>Maaf Data Ini Tidak Tersedia</center></p>";
                    echo   "</div>";
                    echo "</div>";
                } else {
                    $det = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
                    $d = mysqli_fetch_array($det);
                ?>

                    <!-- Card Body -->
                    <div class="card-body">

                        <form method="post" name="edit" enctype="multipart/form-data" required>
                            <div class="row ml-5 mb-2 mt-3">


                                <div class="col-md-4">
                                    <P><b>Ganti Nama</b></p>
                                    <input class="form-control" type="text" value="<?php echo $d['nama']; ?>" placeholder="Ganti Nama..." name="name" required>
                                    <br>
                                    <P><b>Ganti Foto Profile</b></p>
                                    <input type="file" name="pict" accept="image/jpeg, image/png, image/svg" />
                                </div>
                            </div>
                            <br>
                            <div class="row ml-5 mb-2 mt-3">
                                <div class="col-md-5">
                                    <button type="submit" class="btn btn-info" name='edit'>Update</button>&nbsp;<input type="reset" class="btn btn-danger" value="Reset">
                                </div>
                            </div>
                        </form>

                    </div>
                <?php
                }
                ?>


                <?php
                $id_user = $_GET['id'];
                if (isset($_POST['edit'])) {

                    $nama = $_POST['name'];
                    $nama_file = $_FILES['pict']['name'];
                    $ukuran_file = $_FILES['pict']['size'];
                    $source = $_FILES['pict']['tmp_name'];
                    $folder = './img/';
                    $boleh_eks = array('png', 'jpg', 'svg');
                    $x = explode('.', $nama_file);
                    $ekstensi = strtolower(end($x));

                    if (in_array($ekstensi, $boleh_eks) === true) {

                        if ($ukuran_file < 3000000) {

                            move_uploaded_file($source, $folder . $nama_file);
                            $insert = mysqli_query($koneksi, "UPDATE user SET foto = '$nama_file', nama = '$nama' WHERE id = '$id_user' ");

                            if ($insert) {


                                echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5 mt-5'>";
                                echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
                                echo "<p><center>Update Profile Sukses</center></p>";
                                echo   "</div>";
                                echo "</div>";
                            } else {
                                echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5 mt-5'>";
                                echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                                echo "<p><center>Update Profile Gagal</center></p>";
                                echo   "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5 mt-5'>";
                            echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                            echo "<p><center>Ukuran File Terlalu Besar</center></p>";
                            echo   "</div>";
                            echo "</div>";
                        }
                    } else {
                        move_uploaded_file($source, $folder . $nama_file);
                        $insert = mysqli_query($koneksi, "UPDATE user SET nama = '$nama' WHERE id = '$id_user' ");
                        echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5 mt-5'>";
                        echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
                        echo "<p><center>Mengganti Nama Username Sukses</center></p>";
                        echo   "</div>";
                        echo "</div>";
                    }
                }

                ?>

            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
<!-- End of Content Wrapper -->