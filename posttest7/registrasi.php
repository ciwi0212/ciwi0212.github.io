<?php
session_start();

require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST["cpassword"];
    $tmp_name = $_FILES["gambar"]["tmp_name"];
    $file_name = $_FILES["gambar"]["name"];
    $role = $_POST["role"];

    $ekstensi = explode('.', $file_name);
    $ekstensi = strtolower(end($ekstensi));
    $ekstensi = "." . $ekstensi;

    $newFileName = date('y.m.d H.i.s') . '.' . $ekstensi;

    if ($password === $cpassword){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0){
            echo "
            <script>
                alert('Username atau email sudah ada!');
                document.location.href = 'registrasi.php';
            </script>
            ";
        } else {
            if (move_uploaded_file($tmp_name, 'upload/' . $newFileName)) {
                $sql = "INSERT INTO user VALUES (NULL, '$first_name', '$last_name', '$age', '$email', '$hashed_password', '$newFileName', '$role')";
                if (mysqli_query($conn, $sql)) {
                    echo "
                    <script>
                        alert('Registrasi berhasil!');
                        document.location.href = 'login.php';
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                        alert('Gagal menambahkan user ke database.');
                        document.location.href = 'registrasi.php';
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                    alert('Gagal mengupload file.');
                    document.location.href = 'registrasi.php';
                </script>
                ";
            }
        }
    } else {
        echo "
        <script>
            alert('Password tidak sesuai!');
            document.location.href = 'registrasi.php';
        </script>
        ";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="register.css">

</head>

<body>
    <div class="container" id="sign-up">
        <h1 class="logo"> <i class="fa-sharp fa-solid fa-carrot"></i> Fresh-y </h1>
        <h3 class="form-title">Register</h3>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="input">
                <input type="text" name="first-name" id="first-name" placeholder="First Name" required>
                <label for="fname">First Name</label>
            </div>

            <div class="input">
                <input type="text" name="last-name" id="last-name" placeholder="Last Name" required>
                <label for="lname">Last Name</label>
            </div>

            <div class="input">
                <input type="number" name="age" id="age" placeholder="Age">
                <label for="age">Age</label>
            </div>

            <div class="input">
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>

            <div class="input">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <div class="input">
                <input type="file" name="gambar" id="gambar" required>
                <label for="gambar">Upload foto dulu ces</label>
            </div>

            <div class="input">
                <input type="password" name="cpassword" id="cpassword" placeholder="Masukkan Konfirmasi Password..." required>
                 <label for="cpassword"> Konfirmasi Password</label>
            </div>

            <div class="input">
                <select name="role" id="role" required>
                    <option name="role" value="Admin">Admin</option>
                    <option name="role" value="User">User</option>
                </select>
                <label for="role">Role</label>
            </div>

            <input type="submit" class="button" value="Sign Up" name="signup">
        </form>

        <div class="link">
            <p>Already have an account?</p>
            <button id="signInButton">Login</button>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>