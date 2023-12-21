<?php

    include_once('koneksi.php');

    $id = $_GET['id'];

    $query = mysqli_query($koneksi, "SELECT * FROM sewa WHERE id='$id'");
    $row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Edit Sewa</title>
    <link rel="stylesheet" href="css/edit.css">
</head>
<body>
    
    <div class="container">
        <form action="prosesEditSewa.php?id=<?php echo $id; ?>" method="post">

            <label>Judul Buku</label>
            <div><input type="text" name="judul" value="<?php echo $row["judul"] ?>"></div>

            <label>Nama Penyewa</label>
            <div><input type="text" name="penyewa" value="<?php echo $row["penyewa"] ?>"></div>

            <label>Durasi Sewa</label>
            <div><input type="text" name="durasi" value="<?php echo $row["durasi"] ?>"></div>

            <div>
                <input type="submit" name="sewa" value="Sewa Buku"/>
            </div>
        </form>
    </div>
</body>
</html>