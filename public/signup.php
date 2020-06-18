<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TASHA - Sign up</title>
    <link rel="stylesheet" href="css/signup.css">
    <link rel="shortcut icon" type="image/png" href="image/logo.png"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery-3.5.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <a href="index.php">
        <div class="position-fixed home text" >Home</div>
    </a>
    <form class="box" action="signup.php" method="post">
        <h1>Sign Up</h1>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="phone" placeholder="Phone Number">
        <input type="submit" name="register" value="Register">
        <a href="login.php">
            <div class="login">
                <p class="text">&nbsp;Login&nbsp;&nbsp;</p>
            </div>
        </a>
    </form>
</body>
</html>