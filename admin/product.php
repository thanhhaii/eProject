<?php
    session_start();
    require_once '../connect/Database.php';
    $db = new Database();
    $query = "select * from product";
    $stmt = $db->selectData($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TASHA - Product</title>
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
    <script src="js/product.js"></script>
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
			<li class="active"><a href="product.php"><em class="fa fa-calendar">&nbsp;</em> Product</a></li>
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
				<li class="active">Product</li>
			</ol>
		</div><!--/.row-->
        <div class="row">
            <div class="">
                <div class="col-sm-4 float-left">
                    <button class="btn btn-info product all">Product</button>
                    <button class="btn btn-primary category client">Category</button>
                    <button class="btn btn-success img_pro admin">Image Product</button>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <input type="text" class="form-control float-left input-search" placeholder="Search (ID or Name)" style="width: 200px; height: 35px;">
                    <button class="btn btn-primary search float-left" value="product">Search</button>
                    <a class="btn btn-success add_button" style="margin-top: 5px" href="actionProduct.php">Add Product</a>
                </div>
            </div>
            <div id="showproduct">
                <table class="table table-striped table-dark">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price($)</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Content</th>
                        <th scope="col">Status</th>
                        <th scope="col">Category</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody >
                    <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?= $result['id_product'] ?></td>
                            <td><?= $result['name_pro'] ?></td>
                            <td><?= $result['price'] ?></td>
                            <td><?= $result['quantity'] ?></td>
                            <td><?= $result['content'] ?></td>
                            <td><?= $result['status'] == 1?'Show':'Hide' ?></td>
                            <td><?= $result['category_id'] ?></td>
                            <td><img src="../public/image/product/<?= $result['avatar'] ?>" width="50px"></td>
                            <td>
                                <a href="actionProduct.php?id=<?= $result['id_product'] ?>" class="btn btn-primary">Edit</a>
                                <button class="btn btn-danger" type="button" id="<?= $result['id_product'] ?>">Del</button>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
	</div>	<!--/.main-->
	  

<script src="js/templateJs/jquery-1.11.1.min.js"></script>
	<script src="js/templateJs/bootstrap.min.js"></script>
	<script src="js/templateJs/chart.min.js"></script>
	<script src="js/templateJs/chart-data.js"></script>
	<script src="js/templateJs/easypiechart.js"></script>
	<script src="js/templateJs/easypiechart-data.js"></script>
	<script src="js/templateJs/bootstrap-datepicker.js"></script>
	<script src="js/templateJs/custom.js"></script>
	
</body>
</html>
