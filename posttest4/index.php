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
    <div class="container" id="sign-up" style="display: none;">
        <h1 class="logo"> <i class="fa-sharp fa-solid fa-carrot"></i> Fresh-y </h1>
        <h3 class="form-title">Register</h3>

        <form method="POST" action="hasilinput.php">
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
           <input type="submit" class="button" value="Sign Up" name="signup">  
        </form>

        <div class="link">
            <p>Already have an account?</p>
            <button id="signInButton">Sign In</button>
        </div>
    </div>

    <div class="container" id="sign-in">
        <h1 class="logo"><i class="fa-sharp fa-solid fa-carrot"></i> Fresh-y</h1>
        <h2 class="form-title">Sign In</h2>
        <form method="POST" action="hasilinput.php">
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
            <button id="signUpButton">Sign Up</button>
        </div>
<script text="text/javascript" src="script.js"></script>
</body>
</html>