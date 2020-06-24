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
            $query = "select username, password from account where (username =:username and roles = 'admin')";
            $param = [
                'username' => $username
            ];
            $stmt = $db->queryDataParam($query, $param);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = is_countable($result);
            if($count = 1):
                if($result['password']):
                    if(isset($_POST['remember'])):
                        setcookie("usernameAdmin", $username, time()+36000);
                    endif;
                    $_SESSION['usernameAdmin'] = $username;
                    header('location:index.php');
                else:
                    $hidden = 1;
                endif;
            else:
                $hidden = 1;
            endif;
        endif;
    endif;
    if(isset($_SESSION['usernameAdmin']) or isset($_COOKIE['usernameAdmin'])):
        header('location: index.php');
    endif;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TASHA - Product</title>
    <link rel="shortcut icon" type="image/png" href="../public/image/logo.png"/>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/templateJs/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" method="post" action="#">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" autocomplete="off">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button type="submit" class="btn btn-primary">Login</button></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/templateJs/jquery-1.11.1.min.js"></script>
	<script src="js/templateJs/bootstrap.min.js"></script>
</body>
</html>
