<?php
    require_once "../connect/Database.php";
    $db = new Database();
    if(isset($_GET['id'])):
        $id = $_GET['id'];
        $query = "SELECT * FROM product JOIN image ON product.id_product = image.id_product WHERE product.id_product =:id";
        $param = [ "id" => $id ];
        $stmt = $db->queryDataParam($query, $param);
        $query2 = "SELECT * FROM product JOIN category ON product.category_id = category.category_id WHERE product.category_id =:category_id";
        $param2 = [ "category_id" => $_GET['category'] ];
        $stmt2 = $db->queryDataParam($query2,$param2);
    else:
//        header('location:index.php');
    endif;
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
    <link rel="stylesheet" href="css/product.css">
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="js/product.js"></script>
    <script>
        $(document).ready(function () {
            $('.image').hover(function () {
                var a = $(this).attr('src');
                $('#avatar').attr("src",a);
            });
            $("#avatar").attr("src",$('.image').attr('src'));
        });
    </script>
</head>
<body>
    <div class="container-fluid">
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
                    <div class="col-md-12 menu text-center mt-4">
                        <ul class="mb-0">
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="#">ABOUT</a></li>
                            <li><a href="#">CONTACT</a></li>
                            <li><a href="#">PRODUCT</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-1 float-left mt-4">
                    <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)):
                        $name_pro = $result['name_pro']; $quantity = $result['quantity']; $price = $result['price']; $content = $result['content'];
                     ?>
                     <img src="image/product/<?= $result['image'] ?>" style="width: 100px;border: 1px solid black" class="mt-2 image" >
                    <?php endwhile; ?>
                </div>
                <div class="col-5 float-left ml-3 mt-4">
                    <img id="avatar" style="width: 400px">
                </div>
                <div class="col-5 float-left p-0">
                    <p class="mt-3 h3 "><?= $name_pro ?></p>
                    <p class="text-danger h4 mt-1"><?= $price ?>.00$</p>
                    <br/>
                    <span>Số lượng:</span>
                    <input type="number" name="quantity" id="quanity" min="1" max="<?= $quantity ?>" value ="1">
                    <p class="mt-2"><span class="h5">Product Description:</span> <?= $content ?></p>
                    <button type="button" class="btn btn-primary" id="addtocart">Add to cart</button>
                </div>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-1 float-left" style="height: 100px;"></div>
                <div class="col-xl-10 float-left">
                    <hr>
                    <p class="h3 mt-3">Related product</p>
                    <div class="row">
                        <?php while ($result2 = $stmt2->fetch(PDO::FETCH_ASSOC)): ?>
                            <div class="card float-left ml-4 mt-3" style="width: 235px; height: 350px">
                                <img src="image/product/<?= $result2['avatar'] ?>" alt="" class="card-img-top ml-4 mt-2" style="width: 200px; height: 200px">
                                <div class="card-body">
                                    <h5 class="card-title" style="height: 35px"><?= $result2['name_pro'] ?></h5>
                                    <p class="card-text m-0 mb-1 text-danger"><?= $result2['price'] ?>.00$</p>
                                    <a href="product.php?id=<?= $result2['id_product'] ?>" class="btn btn-primary">Product Details</a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <footer class="col-md-12">
                <div class="mt-2" style="height: 300px; background-color: #a0abbb;"></div>
                <div class="text-center" style="width: 100%; background-color: #1A1A1A; height: 40px;">
                    <p class="mb-0" style="color: white; line-height: 40px">Copyright 2020 &copy; <span class="font-weight-bold">TASHA - THE HOME STORE</span></p>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>