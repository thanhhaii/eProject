<?php
    session_start();
    require_once "../connect/Database.php";
    $db = new Database();
    $query = "SELECT * FROM product LIMIT 1, 12";
    $stmt = $db->selectData($query);

    $query_category = "select * from category";
    $stmt_category = $db->selectData($query_category);
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
    <link rel="stylesheet" href="css/index.css">
    <script src="bootstrap/js/jquery-3.5.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
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
                    <?php  require_once '../template/account.php';?>
                </div>
                </div>
                <div class="col-md-12 menu text-center mt-4">
                    <ul class="mb-0">
                        <li><a href="index.php">HOME</a></li>
                        <li><a href="#footer">ABOUT</a></li>
                        <li><a href="#footer">CONTACT</a></li>
                        <li><a href="#">PRODUCT</a></li>
                        <li><a href="#">CART</a></li>
                    </ul>
                </div>
                <div class="container mt-1 category">
                    <p class="h4 pt-1">Category</p>
                    <hr/>
                    <?php while ($result_category = $stmt_category->fetch(PDO::FETCH_ASSOC)): ?>
                    <div class="subcategory style_prevu_kit category_id" id="<?= $result_category['category_id'] ?>" >
                        <img src="image/<?= $result_category['category_img'] ?> " class="category_img">
                    </div>
                    <?php endwhile; ?>
                </div>
            </nav>
        </header>
        <div class="col-md-12 mt-1 clearfix">
            <div class="container d-block">
                <div class="row" id="show-product">
                <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <a href="product.php?id=<?= $result['id_product'] ?>">
                    <div class="card float-left ml-2 mt-2 style_prevu_kit card-product size-product">
                        <img src="image/product/<?= $result['avatar'] ?>" class="card-img-top img-card" height="188px" width="188px">
                        <div class="card-body">
                            <h5 class="card-title" style="height: 35px; font-size: 18px"><?= $result['name_pro'] ?></h5>
                            <p class="card-text m-0 mb-1 text-danger"><?= $result['price'] ?>.00$</p>
                        </div>
                    </div>
                </a>
                <?php endwhile; ?>
                </div>
                <div class="col-xl-12 text-center clearfix">
                    <div id="seemore">See more</div>
                </div>
            </div>
        </div>
        <?php  require_once '../template/footer.php';?>
    </main>
</body>
</html>