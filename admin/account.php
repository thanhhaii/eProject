<?php
    session_start();
    require_once '../connect/Database.php';
    $db = new Database();
    $query = "select * from account";
    $stmt = $db->selectData($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TASHA - Account</title>
    <link rel="shortcut icon" type="image/png" href="../public/image/logo.png"/>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/templateJs/respond.min.js"></script>
    <![endif]-->
    <script src="js/templateJs/jquery-3.5.0.min.js"></script>
    <script src="js/account.js"></script>
</head>
<body>
    <?php require_once 'templateAdmin/nav.php';?>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">Username</div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <ul class="nav menu">
            <li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Order Management</a></li>
            <li><a href="product.php"><em class="fa fa-calendar">&nbsp;</em> Product</a></li>
            <li class="active"><a href="account.php"><em class="fa fa-clone">&nbsp;</em> Account</a></li>
            <li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Account</li>
			</ol>
		</div><!--/.row-->
        <div class="row">
            <div class="row">
                <div class="col-sm-4 float-left">
                    <button class="btn btn-info all">All</button>
                    <button class="btn btn-primary client">Client</button>
                    <button class="btn btn-success admin">Admin</button>
                </div>
                <div class="col-sm-4"></div>
                <div class=" col-sm-4 float-right">
                    <input type="text" class="form-control float-left input-search" placeholder="Search" style="width: 200px; height: 35px;">
                    <button class="btn btn-primary search float-left">Search</button>
                </div>
            </div>
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">Username ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody id="showaccount">
                <?php while($result = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                <tr>
                    <td><?= $result['username_id'] ?></td>
                    <td><?= $result['username'] ?></td>
                    <td><?= $result['email'] ?></td>
                    <td>0<?= $result['phone'] ?></td>
                    <td><?= $result['roles'] ?></td>
                    <td>
                        <a href="" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-danger">Del</a>
                    </td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
	</div><!--/.main-->

	<script src="js/templateJs/bootstrap.min.js"></script>
	<script src="js/templateJs/chart.min.js"></script>
	<script src="js/templateJs/chart-data.js"></script>
	<script src="js/templateJs/easypiechart.js"></script>
	<script src="js/templateJs/easypiechart-data.js"></script>
	<script src="js/templateJs/bootstrap-datepicker.js"></script>
	<script src="js/templateJs/custom.js"></script>
	
</body>
</html>
