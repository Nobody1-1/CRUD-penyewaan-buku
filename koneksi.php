<?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "tokobuku";

    $koneksi = mysqli_connect($server, $user, $password, $database) OR DIE ("koneksi Gagal");