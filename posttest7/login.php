<?php 
session_start();

require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1){
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password'])){
            $_SESSION['login'] = true;
            
            if ($user['role'] === 'Admin') {
                $_SESSION['role'] = 'Admin';
                echo "
                    <script>
                        alert('met datang, admin');
                        document.location.href = 'admin.php';
                    </script>
                    ";
            } else {
                $_SESSION['role'] = 'User';
                echo "
                    <script>
                        alert('met datang, user');
                        document.location.href = 'index.php';
                    </script>
                    ";
                }
            } else {
                echo "
                    <script>
                        alert('password salah gan!');
                    </script>
                    ";
                }
            } else {
                echo "
                    <script>
                        alert('Username gaada well');
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
    <title>Login Page</title>

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
        .logo i {
            color: orangered;
        }
        .logo {
            color: black;
            text-align: center;
            margin: 10px 0 20px;
        }
        .container {
            background: white;
            width: 450px;
            padding: 1.5rem;
            margin: 50px auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)
        }
        form {
            margin: 0;
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
        input:focus {
            background-color: transparent;
            border-bottom: 2px solid hsl(0, 0%, 0%)
            outline: transparent;
        }
        input::placeholder{
            color: transparent;
        }
        label {
            color: grey;
            position: relative;
            left: 5px;
            top: -24px;
            font-size: 13px;
            cursor: auto;
            transition: 0.3 ease all;
        }
        input:focus~label, input:not(:placeholder-shown)~label {
            top: -3em;
            color: hsl(0, 0%, 0%);
        }
        .forgot a {
            text-decoration: none;
            color: black;
            font-size: 15px;
        }
        .forgot a:hover {
            color: blue;
            text-decoration: underline;
        }
        .button {
            font-size: 15px;
            padding: 5px 0;
            border-radius: 4px;
            outline: none;
            border: none;
            width: 100%;
            background: orangered;
            color: white;
            cursor: pointer;
            transition: 0.7s;
            text-align: center;
        
        }
        .link {
            display: flex;
            justify-content: space-around;
            padding: 0 4rem;
            margin-top: 0.9rem;
        }
        .link p {
            font-size: 15px;
        }
        button {
            color: orangered;
            border: none;
            background-color: transparent;
        }
        button:hover{
            text-decoration: underline;
            color: blue;
        }
    </style>
</head>
<body>
    <div class="container" id="sign-in">
        <h1 class="logo"><i class="fa-sharp fa-solid fa-carrot"></i> Fresh-y</h1>
        <h2 class="form-title">Login</h2>
    <form method="POST" action="">
        <div class="input">
            <input type="email" name="email" id="email" placeholder="Email" required>
            <label for="email">Email</label>
        </div>
        <div class="input">
            <input type="password" name="password" id="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        <p class="forgot">
            <a href="#">forgot password</a>
        </p>
        <input type="submit" class="button" value="Sign In" name="signin">
    </form>
    <div class="link">
        <p>Don't have an account yet?</p>
        <a href="registrasi.php">Sign Up</a>
        <!-- <button id="signUpButton">Sign Up</button> -->
        <!--  -->
    </div>

</div>
<script src="script.js"></script>
</body>
</html>