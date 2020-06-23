<?php
    session_start();
    require_once "../connect/Database.php";
    $db = new Database();
    if(isset($_GET['id'])):
        $id = $_GET['id'];
        $query = "SELECT * FROM product JOIN image ON product.id_product = image.id_product WHERE product.id_product =:id";
        $query_check = "select name_pro from product where id_product =:id";
        $param = [ "id" => $id ];
        $stmt = $db->queryDataParam($query, $param);
        $stmt_check = $db->queryDataParam($query_check,$param);
        $result_check = $stmt_check->fetch(PDO::FETCH_ASSOC);
        $count = is_countable($result_check);
        if($count == 0):
            header('location:index.php');
        endif;
    else:
        header('location:index.php');
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
                    <?php require_once '../template/account.php';?>
                    <div class="col-md-12 menu text-center mt-4">
                        <ul class="mb-0">
                            <li><a href="index.php">HOME</a></li>
                            <li><a href="#footer">ABOUT</a></li>
                            <li><a href="#footer">CONTACT</a></li>
                            <li><a href="#">PRODUCT</a></li>
                            <li><a href="#">CART</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-1 float-left mt-4">
                    <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)):
                        $name_pro = $result['name_pro']; $quantity = $result['quantity']; $price = $result['price']; $content = $result['content']; $cateogry_id = $result['category_id'];
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
                    <span class="h5 float-left mt-1 mr-3">Quantity:</span>
                    <div class="input-group mb-3 float-left" style="width: 120px; height: 30px">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary font-weight-bold" type="button" id="minus">-</button>
                        </div>
                        <input type="text" class="form-control text-center" id="quantity" value="1" aria-describedby="basic-addon1">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary font-weight-bold" type="button" id="plus">+</button>
                        </div>
                    </div>
                    <div class="position-relative" style="top: 5px; left: 20px; color: #757575">
                        <span><span id="quantity_product"><?= $quantity ?></span> products available</span>
                    </div>
                    <div class="row col-12">
                        <p class="mt-2"><span class="h5">Product Description:</span> <?= $content ?></p>
                    </div>
                    <button type="button" class="btn btn-primary" id="addtocart">Add to cart</button>
                </div>
            </div>

        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12 float-left">
                    <hr>
                    <p class="h3 mt-3">Related product</p>
                    <div class="row">
                    <?php
                    $query_related = "SELECT * FROM product WHERE category_id = $cateogry_id";
                    $stmt_related = $db->selectData($query_related);
                    while ($result2 = $stmt_related->fetch(PDO::FETCH_ASSOC)): ?>
                        <a href="product.php?id=<?= $result['id_product'] ?>">
                            <div class="card float-left ml-2 mt-2 style_prevu_kit card-product size-product">
                                <img src="image/product/<?= $result2['avatar'] ?>" class="card-img-top img-card" height="188px" width="188px">
                                <div class="card-body">
                                    <h5 class="card-title" style="height: 35px; font-size: 18px"><?= $result2['name_pro'] ?></h5>
                                    <p class="card-text m-0 mb-1 text-danger"><?= $result2['price'] ?>.00$</p>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once '../template/footer.php';?>
    </div>
</body>
</html>