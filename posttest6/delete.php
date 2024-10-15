<?php
require "koneksi.php";

$id = $_GET["id"];

$result = mysqli_query($conn, "DELETE FROM user WHERE id = $id");

if($result){
    echo "
    <script>
    alert('Data Terhapus!');
    document.location.href = 'read.php';
    </script>
    ";
}
?>