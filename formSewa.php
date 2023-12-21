<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Sewa</title>
    <link rel="stylesheet" href="css/add.css">
</head>
<body>
    
    <div class="container">
        <form action="prosesSewa.php" method="post">

            <label>Judul Buku</label>
            <div><input type="text" name="judul"></div>

            <label>Nama Penyewa</label>
            <div><input type="text" name="penyewa"></div>

            <label>Durasi Sewa</label>
            <div><input type="text" name="durasi"></div>

            <div>
                <input type="submit" name="sewa" value="Sewa Buku"/>
            </div>
        </form>
    </div>
</body>
</html>