<?php

    include_once('koneksi.php');

    $id = $_GET['id'];

    $judul = $_POST['judul'];
    $penyewa = $_POST['penyewa'];
    $durasi = $_POST['durasi'];

    $tanggal_sewa = date('Y-m-d');


    mysqli_query($koneksi, "UPDATE sewa SET judul = '$judul',
                                            penyewa = '$penyewa',
                                            durasi = '$durasi',
                                            WHERE id = '$id'");

    header("location: index.php");