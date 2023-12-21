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
        <form action="prosesCustomer.php" method="post">

            <label>Nama</label>
            <div><input type="text" name="nama"></div>

            <label>Alamat</label>
            <div><input type="text" name="alamat"></div>

            <label>Telepon</label>
            <div><input type="text" name="telepon"></div>

            <div>
                <input type="submit" name="sewa" value="Submit"/>
            </div>
        </form>
    </div>
</body>
</html>