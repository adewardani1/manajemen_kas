<?php
ob_start();
include_once("function/koneksi.php");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>


<!--CONTENT BEGIN-->
<h3>
    <p class="text-center mt-4">Data Anggota</p>
</h3>

<center>
    <table class=" mt-4" width="1000px" border="1">
        <tr>
            <td>
                <center>No
            </td>
            <td>
                <center>Nama Anggota
            </td>
            <td>
                <center>Alamat
            </td>
            <td>
                <center>Tanggal Lahir
            </td>
            <td>
                <center>Umur
            </td>
        </tr>

        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM anggota");
        while ($row = mysqli_fetch_array($query)) {

            //tanggal lahir
            $tanggal = new DateTime($row['umur']);

            // tanggal hari ini
            $today = new DateTime('today');

            // tahun
            $y = $today->diff($tanggal)->y;



        ?>
            <tr>
                <td>
                    <center><?php echo $no ?>
                </td>
                <td>
                    <center><?php echo $row['nama'] ?>
                </td>
                <td>
                    <center><?php echo $row['alamat'] ?>
                </td>
                <td>
                    <center><?php echo $row['umur'] ?>
                </td>
                <td>
                    <center><?php echo $y . " Tahun" ?>
                </td>
            </tr>
        <?php
            $no++;
        }
        ?>

        <?php
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename= Data_Anggota.xls");
        ?>

        <!--Conent End-->

        <!-- Optional JavaScript -->
        <!-- Popper.js first, then Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        </body>

</html>