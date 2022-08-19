<?php
include_once("function/koneksi.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<!--content-->
<h3>
    <p class="text-center mt-4">Data Pengeluaran Dana</p>
</h3>

<center>
    <table class=" mt-4" width="1000px" border="1">
        <tr>
            <td>
                <center>No
            </td>
            <td>
                <center>Nama Pengeluaran
            </td>
            <td>
                <center>Jumlah
            </td>
            <td>
                <center>Tanggal
            </td>
            <td>
                <center>Keterangan
            </td>
        </tr>

        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM pengeluaran");
        while ($row = mysqli_fetch_array($query)) {

        ?>
            <tr>
                <td>
                    <center><?php echo $no ?>
                </td>
                <td>
                    <center><?php echo $row['nama'] ?>
                </td>
                <td>
                    <center><?php echo $row['jumlah'] ?>
                </td>
                <td>
                    <center><?php echo $row['tanggal'] ?>
                </td>
                <td>
                    <center><?php echo $row['keterangan'] ?>
                </td>
            </tr>
        <?php
            $no++;
        }
        ?>

        <?php
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename= Data_pengeluaran.xls");
        ?>
        <!--content end-->

        <!-- Optional JavaScript -->
        <!-- Popper.js first, then Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        </body>

</html>