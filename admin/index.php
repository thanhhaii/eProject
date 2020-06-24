<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ADMIN - The Home Store</title>
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
			<li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Order Management</a></li>
			<li><a href="product.php"><em class="fa fa-calendar">&nbsp;</em> Product</a></li>
			<li><a href="account.php"><em class="fa fa-clone">&nbsp;</em> Account</a></li>
			<li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Order Management</li>
			</ol>
		</div><!--/.row-->
	</div>	<!--/.main-->
	
	<script src="js/templateJs/jquery-1.11.1.min.js"></script>
	<script src="js/templateJs/bootstrap.min.js"></script>
	<script src="js/templateJs/chart.min.js"></script>
	<script src="js/templateJs/chart-data.js"></script>
	<script src="js/templateJs/easypiechart.js"></script>
	<script src="js/templateJs/easypiechart-data.js"></script>
	<script src="js/templateJs/bootstrap-datepicker.js"></script>
	<script src="js/templateJs/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>
		
</body>
</html>