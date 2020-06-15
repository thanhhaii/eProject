<?php
    require_once "../connect/Database.php";
    $db = new Database();
    $query = "select * from product";
    $stmt = $db->selectData($query);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TASHA - The Home Store</title>
    <link rel="shortcut icon" type="image/png" href="image/logo.png"/>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="container-fluid">
        <header class="row">
            <nav class="col-md-12">
                <div class="col-md-12">
                    <div class="col-md-12 text-center">
                        <img src="image/logo.png" class="logo">
                        <img src="image/tasha.png" class="bannerTasha">
                    </div>
                    <div class="col-md-12 clearfix">
                        <div class="col-md-2 float-right header-login">
                            <img src="image/user.png" class="userIcon">
                            <a href="login.php">Sign in</a> /
                            <a href="signup.php">Sign up</a>
                        </div>
                        <div class="col-md-8 text-center float-right">
                            <form action="">
                                <input type="text" name="search" class="search" placeholder="Search">
                                <button type="submit" class="submit"><img src="image/icons8-search-24.png" ></button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-12 menu text-center mt-4">
                    <ul class="mb-0">
                        <li><a href="#">HOME</a></li>
                        <li><a href="#">ABOUT</a></li>
                        <li><a href="#">CONTACT</a></li> 
                        <li><a href="#">PRODUCT</a></li>
                    </ul>
                </div>
                <div class="col-md-12">
                     <div class="container">
                        <p class="font-weight-bold mb-1 mt-1">CATEGORY</p>
                         <div class="category">
                            <?php for($i = 1; $i <= 8; $i++): ?>
                                    <div class="float-left subcategory">

                                    </div>
                            <?php endfor; ?>
                         </div>
                     </div>
                </div>
            </nav>
        </header>
        <div class="col-md-12 mt-1 clearfix">
            <div class="col-xl-1 float-left" style="height: 100px;"></div>
            <div class="col-xl-10 col-lg-12 float-left">
                <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <div class="card float-left ml-2 mt-2" style="width: 235px; height: 350px">
                    <img src="image/product/<?= $result['avatar'] ?>" alt="" class="card-img-top ml-4 mt-2" style="width: 200px; height: 200px">
                    <div class="card-body">
                        <h5 class="card-title" style="height: 35px"><?= $result['name_pro'] ?></h5>
                        <p class="card-text m-0 mb-1 text-danger"><?= $result['price'] ?>.00$</p>
                        <a href="product.php?id=<?= $result['id_product'] ?>&category=<?= $result['category_id'] ?>" class="btn btn-primary">Product Details</a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <footer class="col-md-12">
            <div class="mt-2" style="height: 300px; background-color: #a0abbb;"></div>
            <div class="text-center" style="width: 100%; background-color: #1A1A1A; height: 40px;">
                <p class="mb-0" style="color: white; line-height: 40px">Copyright 2020 &copy; <span class="font-weight-bold">TASHA - THE HOME STORE</span></p>
            </div>
        </footer>
    </main>
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>