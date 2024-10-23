<?php 
session_start();

if(!isset($_SESSION['login']) || $_SESSION['role'] !== 'Admin'){
    header('Location: login.php');
}

require "koneksi.php";

$sql = mysqli_query($conn, "SELECT * FROM user");

$user = [];

while ($row = mysqli_fetch_assoc($sql)) {
    $user[] = $row;
}

if(isset($_GET['search'])){
    $search = $_GET['search'];

    $sql = mysqli_query($conn, "SELECT * FROM user WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' ");

    $user = [];

    while ($row = mysqli_fetch_assoc($sql)) {
        $user[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #ffebbb;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px 50px;
            background-color: white;
            width: 100%;
        }

        .header, i {
            color: orangered;
        }

        .header, .logo{
            font-size: 20px;
            font-weight: bolder;
            color: black;
            border: #eeeeee;
            text-decoration: none;
        }

        h4 {
            padding-top: 120px;
            text-align: center;
            font-size: 20px;
        }

        table{
            border-collapse: collapse;
            width: 100%;
        }

        th {
            background-color: orangered;
            color: #eeeeee;
            height: 50px;
        
        }

        td {
            text-align: center;
        }

        .btn {
            display:inline-block;
            padding: none;
            background-color: orangered;
            color: black;
            text-decoration: none;
            border: none;
            font-size: 12px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        button {
            background-color: #FF6B3D;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 30%;
            transition: background-color 0.3s ease;
            margin: 0 auto;
            display: block;
        }
        
        .search {
            width: 200px; 
            padding: 10px;
            font-size: 16px; 
            margin-right: 10px;
        }
        
        .search-button {
            background-color: #E86F51; 
            color: white; 
            padding: 8px 20px; 
            border: none; 
            border-radius: 5px; 
            cursor: pointer; 
            font-size: 14px;
        }
    </style>
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
</body>
</html>