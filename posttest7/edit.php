<?php 
require "koneksi.php";

$id = $_GET["id"];

$user = [];

$result = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");

while($row = mysqli_fetch_assoc($result)){
    $user[]=$row;
}

$user = $user[0];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $tmp_name = $_FILES["gambar"]["tmp_name"];
    $file_name = $_FILES["gambar"]["name"];

    $ekstensi = explode('.', $file_name);
    $ekstensi = strtolower(end($ekstensi));
    $ekstensi = "." . $ekstensi;

    $newFileName = date('y.m.d H.i.s') . '.' . $ekstensi;

if (move_uploaded_file($tmp_name, 'upload/' . $newFileName)) {
    $sql = "UPDATE user 
        SET first_name = '$first_name', 
            last_name = '$last_name', 
            age = '$age', 
            email = '$email',
            picture = '$newFileName'
        WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "
        <script>
        alert('berhasil mengubah data user');
        document.location.href = 'read.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('gagal mengubah data user');
        document.location.href = 'read.php'
        </script>
        ";
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update</title>

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
        padding-top: 30px;
        text-align: center;
        font-size: 20px;
        padding-bottom: 30px;
    }

    .container {
    background-color: white;
    max-width: 400px;
    padding: 50px;
    margin: 40px auto;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding-top: 30px;
    margin-top: 100px;
    }

    .form-title {
    font-size: 19px;
    margin-bottom: 5px;
    }
    
    input {
    width: 100%;
    border: none;
    border-bottom: 1px solid black;
    }

    .input {
    padding: 1% 0;
    position: relative;
    }

    label {
    padding-top: 30px;
    color: grey;
    position: relative;
    left: 1px;
    top: -24px;
    font-size: 13px;
    cursor: auto;
    transition: 0.3 ease all;
    }

    input:focus {
    background-color: transparent;
    border-bottom: 2px solid hsl(0, 0%, 0%);
    outline: transparent;
    }

    input:focus~label, input:not(:placeholder-shown)~label {
    top: -3em;
    color: grey;
    }

    .button {
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

    </style>
</head>
<body>
    <header class="header">
        <a href="#" class="logo"><i class="fa-sharp fa-solid fa-carrot"></i> Fresh-y </a>
    </header>

        <div class="container">
        <h4 class="form-title">Update Pengguna</h4>

    <form method="POST" action="" enctype="multipart/form-data">
        <div class="input">
        <input type="text" name="first_name" id="first_name" value="<?= $user["first_name"] ?>" required>
        <label for="fname">First Name</label>
        </div>

        <div class="input">
        <input type="text" name="last_name" id="last_name" value="<?= $user["last_name"] ?>" required>
        <label for="lname">Last Name</label>
        </div>

        <div class="input">
        <input type="number" name="age" id="age" value="<?= $user["age"] ?>" required>
        <label for="age">Age</label>
        </div>

        <div class="input">
        <input type="email" name="email" id="email" value="<?= $user["email"] ?>" required>
        <label for="email">Email</label>
        </div>

        <div class="input">
        <input type="file" name="gambar" id="gambar" value="<?= $user["picture"] ?>" required>
        <label for="gambar">Picture</label>
        </div>

        <input type="submit" class="button" value="update">
    </form>
    </div>

    <br>
    <button onclick="window.location.href='read.php'">Kembali ke data user</button>
</body>
</html>