<?php
    $server = 'localhost';
    $user = 'root';
    $password = 'can021204_';
    $db_nama = 'db_user';


    $conn = mysqli_connect($server, $user, $password, $db_nama);

    if(!$conn){
        die("Gagal terhubung ke database: " . mysqli_connect_error());
    }


?>