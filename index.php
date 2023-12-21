<?php
    session_start();
    
    include_once('koneksi.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read Sewa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="container">
            <div class="nav">
                <h1>Peminjaman buku</h1>
                <h1><?php echo $_SESSION['username'] ?></h1>
            </div>
            <div style='margin-bottom: 20px'>
                <a href="formCustomer.php">Customer Baru</a>
                <table border="1px">

                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Action</th>
                    </tr>

                    <?php

                        $query = mysqli_query($koneksi, 'SELECT * FROM customer');

                        $no = 1;
                        while($row=mysqli_fetch_array($query)){


                            echo "<tr>";
                            echo "<td>$no</td>";
                            echo "<td>$row[nama]</td>";
                            echo "<td>$row[alamat]</td>";
                            echo "<td>$row[telepon]</td>";
                            echo "<td><a href='formEditCustomer.php?id=$row[id]'>Edit</a>
                                    <a href='prosesDeleteCustomer.php?id=$row[id]'>Delete</a></td>";

                            $no++;
                        }
                    ?>
                
                </table>
            </div>
            <div>
                <a href="formSewa.php">Penyewa Baru</a>
                <table border="1px">

                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Nama Penyewa</th>
                        <th>Tanggal Sewa</th>
                        <th>Durasi</th>
                        <th>Tanggal Selesai</th>
                        <th>Action</th>
                    </tr>

                    <?php

                        $query = mysqli_query($koneksi, 'SELECT * FROM sewa');

                        $no = 1;
                        while($row=mysqli_fetch_array($query)){

                            $tanggal_selesai = date('Y-m-d', strtotime($row['tanggal_sewa'] . "+ $row[durasi] days"));

                            echo "<tr>";
                            echo "<td>$no</td>";
                            echo "<td>$row[judul]</td>";
                            echo "<td>$row[penyewa]</td>";
                            echo "<td>$row[tanggal_sewa]</td>";
                            echo "<td>$row[durasi]</td>";
                            echo "<td>$tanggal_selesai</td>";
                            echo "<td><a href='formEditSewa.php?id=$row[id]'>Edit</a>
                                    <a href='prosesDeleteSewa.php?id=$row[id]'>Delete</a></td>";

                            $no++;
                        }
                    ?>
                
                </table>
            </div>
    </div>
</body>
</html>