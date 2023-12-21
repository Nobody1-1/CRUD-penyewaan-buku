<?php

    include_once('koneksi.php');

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];



    mysqli_query($koneksi, "INSERT INTO customer (nama,alamat,telepon) VALUES ('$nama','$alamat','$telepon')");

    header("location: index.php");