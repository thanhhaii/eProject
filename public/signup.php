<?php
    require_once '../connect/Database.php';
    session_start();
    $db = new Database();
    if(isset($_SESSION['username']) or isset($_COOKIE['username'])):
        header('location: index.php');
    endif;
    if($_SERVER['REQUEST_METHOD'] == 'POST'):
        $username = $_POST['username'];
        $hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $phone    = $_POST['phone'];
        $email    = $_POST['email'];
        $query = "insert into account(username, password, email, phone, roles) values (:username, :password, :email, :phone, 'client')";
        $param = [
                'username'  =>  $username,
                'password'  =>  $hash,
                'email'     =>  $email,
                'phone'     =>  $phone
        ];
        $stmt = $db->queryDataParam($query, $param);
        header('location: login.php');
    endif;
//?>

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
    <script src="js/signup.js"></script>
</head>
<body>
    <a href="index.php">
        <div class="position-fixed home text" >Home</div>
    </a>
    <form class="box" action="" method="post">
        <h1>Sign Up</h1>
        <div>
            <input type="text" name="username" placeholder="Username" id="username"  autocomplete="off">
        </div>
        <span id="errorUsername"></span>
        <input type="password" name="password" placeholder="Password" id="password">
        <span id="errorPassword"></span>
        <input type="email" name="email" placeholder="Email" id="email"  autocomplete="off">
        <span id="errorEmail"></span>
        <input type="number" name="phone" placeholder="Phone Number" id="phone" autocomplete="off">
        <span id="errorPhone"></span>
        <input type="submit" name="register" value="Register" id="submit" >
        <a href="login.php">
            <div class="login">
                <p class="text">&nbsp;Login&nbsp;&nbsp;</p>
            </div>
        </a>
    </form>
</body>
</html>