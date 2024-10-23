<?php
session_start();

if(!isset($_SESSION['login']) || $_SESSION['role'] !== 'User'){
    header('Location: login.php');
}


require "koneksi.php";
$sql = mysqli_query($conn, "SELECT * FROM user");

$user = [];

while ($row = mysqli_fetch_assoc($sql)) {
    $user[] = $row;

    if(isset($_GET['search'])){
        $search = $_GET['search'];
    
        $sql = mysqli_query($conn, "SELECT * FROM user WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' ");
    
        $user = [];
    
        while ($row = mysqli_fetch_assoc($sql)) {
            $user[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="read.css">
    <title>Data Pengguna</title>
</head>
<body>
    <header class="header">
        <a href="#" class="logo"><i class="fa-sharp fa-solid fa-carrot"></i> Fresh-y </a>
    </header>
    <h4>Data Pengguna</h4>
    <br>
    <br>

    <form action="" method="get">
        <input type="text" name="search" placeholder="Cari Nama">
    </form>
    <div class="container">
    <table border="1">
            <tr>
                <th>No.</th>
                <th>Picture</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Email</th>
                <th>Menu</th>
            </tr>
        <tbody>
            <?php $i = 1; 
            foreach($user as $usr) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <?php $direktori = "upload/" . $usr["picture"]; ?>
                    <td>
                        <center>
                            <?php if ($usr["picture"] == "") {
                                echo "foto belum ada";
                            } else {
                                echo "<img src='$direktori' alt='picture' width='50px' height='50px'>";
                            } ?>
                        </center>
                    </td>
                    <td><?= $usr["first_name"] ?></td>
                    <td><?= $usr["last_name"] ?></td>
                    <td><?= $usr["age"] ?></td>
                    <td><?= $usr["email"] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $usr["id"] ?>" class="btn">Ubah</a> | 
                        <a href="delete.php?id=<?= $usr["id"] ?>" class="btn"">Hapus</a>
                    </td>
                </tr>
                <?php $i++;
                endforeach ?>
            </tbody>
        </table>

    </div>
    <br>
    <button onclick="window.location.href='index.php'">Tambah Data</button>
    <br>
    <br>
    <button onclick="window.location.href='index.html'">Masuk ke web</button>
    <br>
    <br>
    <a href="logout.php">
    <button>
        <p>Logout</p>
    </button>
</a>
</body>
</html>