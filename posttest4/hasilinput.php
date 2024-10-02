<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['signup'])){
        $first_name = htmlspecialchars($_POST['first-name']);
        $last_name = htmlspecialchars($_POST['last-name']);
        $age = htmlspecialchars($_POST['age']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        echo 'Data Registrasi: ';
        echo 'First Name: ' . $first_name . '<br>';
        echo 'Last Name: ' . $last_name . '<br>';
        echo 'Age: ' . $age . '<br>';
        echo 'Email: ' . $email . '<br>';
        echo 'Password: ' . $password . '<br>';  
        
        header('refresh:3;  url=index.html');
        echo '<p>Masuk ke web dalam 3 detik. . .</p>';
}

    if(isset($_POST['signin'])){
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        echo 'Data Login: ';
        echo 'Email: ' . $email . '<br>';
        echo 'Password: ' . $password . '<br>'; 
        
        header('refresh:3;  url=index.html');
        echo '<p>Masuk ke web dalam 3 detik. . .</p>';
}
}
 
?>