<?php
    session_start();
    require_once '../connect/Database.php';
    $db = new Database();
    if($_SERVER['REQUEST_METHOD'] == 'POST'):
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == "" || $password == ""):
            $hidden = 1;
        else:
            $query = "select username, password from account where username =:username";
            $param = [
                'username' => $username
            ];
            $stmt = $db->queryDataParam($query, $param);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = count($result['username']);
            if($count = 1):
                if(password_verify($password,$result['password'])):
                    if(isset($_POST['rememberlogin'])):
                        setcookie("username", $username, time()+36000);
                    endif;
                    $_SESSION['username'] = $username;
                    header('location:index.php');
                else:
                    $hidden = 1;
                endif;
            else:
                $hidden = 1;
            endif;
        endif;
    endif;
    if(isset($_SESSION['username']) or isset($_COOKIE['username'])):
        header('location: index.php');
    endif;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>َTASHA - Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" type="image/png" href="image/logo.png"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery-3.5.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <a href="index.php">
            <div class="position-fixed home text" >Home</div>
        </a>
        <div class="error w-100 fixed-top"  style="background-color: red; font-size: 16px; height: 25px; color: #ffffff;" <?= isset($hidden)? "" : "hidden" ?>>
            <span style="margin: 5px 5px; ">Username or password incorrect</span>
        </div>
        <form class="box" action="login.php" method="post">
            <h1>Login</h1>
            <input type="text" name="username" placeholder="Username" autocomplete="off">
            <input type="password" name="password" placeholder="Password">
            <input type="checkbox" name="rememberlogin" id="rememberlogin" value="1">
            <label for="rememberlogin" class="mb-1 mt-1">Remember login</label>
            <div class="www">
                <div class="login">
                    <input type="submit" name="login" value="Login">
                </div>
                <a href="signup.php">
                    <div class="signup">
                        <p class="text">Sign up</p>
                    </div>
                </a>
            </div>
        </form>
    </div>
</body>
</html>
