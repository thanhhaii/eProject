<?php
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
    <link rel="stylesheet" href="css/style.css">
    <script src="bootstrap/js/jquery-3.5.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="scss/style.scss">
    <script src="js/style.js"></script>
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
                            <a href="login.php" class="account" <?= isset($_SESSION['username']) || isset($_COOKIE['username'])? 'hidden' : '' ?>>Login</a>
                            <a href="signup.php" class="account" <?= isset($_SESSION['username']) || isset($_COOKIE['username'])? 'hidden' : '' ?>>Sign up</a>

                        </div>
                        <div class="col-md-8 text-center float-right">
                            <input type="text" name="search" class="search" id="search" placeholder="Search">
                            <img src="image/icons8-search-24.png" id="search_button">
                        </div>
                    </div>
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
        <footer class="col-md-12" id="footer">
            <div class="mt-2" style="height: 300px; background-color: #E1E1E1;">
                <div class="col-xl-3 h-25 float-left"></div>
                <div class="col-xl-2 float-left" style="height: 100px">
                    <div class="about mt-2">
                        <img src="image/logo.png" class="about-img__logo">
                        <img src="image/tasha.png" class="about-img__tasha">
                    </div>
                    <hr/>
                    <p class="mt-2 mb-0">TASHA - The Home Store:</p>
                    <p class="mb-0">We specialize in providing high quality kitchen appliances</p>
                    <p>Motto: Customer satisfaction is our pleasure</p>
                    <hr/>
                    <p class="font-weight-bold">Thanks you!</p>
                </div>
                <div class="col-xl-2 float-left h-100">
                    <p class="font-weight-bold h2 mt-3 ml-2">Contact</p>
                    <hr/>
                    <p class="ml-2">Phone: +84965140743</p>
                    <hr/>
                    <p class="ml-2 mt-2 mb-0">hai.lnt34@atpechlearning.edu.vn</p>
                    <p class="ml-2 mb-0">an.dmt28@atpechlearning.edu.vn</p>
                    <p class="ml-2">chau.ptm44@atpechlearning.edu.vn</p>
                </div>
                <div class="col-xl-2 float-left h-100">
                    <p class="font-weight-bold h2 mt-3 ml-2">Address</p>
                    <hr/>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.282982943546!2d106.69300631480093!3d10.789624892312567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528cb4ba30aa5%3A0x3a0ddc230888b922!2zMjQgUGhhbiBMacOqbSwgxJBhIEthbywgUXXhuq1uIDEsIEjhu5MgQ2jDrSBNaW5o!5e0!3m2!1svi!2s!4v1592206904727!5m2!1svi!2s" width="275" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="text-center" style="width: 100%; background-color: #1A1A1A; height: 40px;">
                <p class="mb-0" style="color: white; line-height: 40px">Copyright 2020 &copy; <span class="font-weight-bold">TASHA - THE HOME STORE</span></p>
            </div>
        </footer>
    </main>
</body>
</html>