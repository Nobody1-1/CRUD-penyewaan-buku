<?php

    include_once('koneksi.php');

    $id = $_GET['id'];

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];



    mysqli_query($koneksi, "UPDATE customer SET nama = '$nama',
                                            alamat = '$alamat',
                                            telepon = '$telepon',
                                            WHERE id = '$id'");

    header("location: index.php");