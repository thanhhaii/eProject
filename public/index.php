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
    <script src="https://kit.fontawesome.com/55d46ee21c.js" crossorigin="anonymous"></script>
</head>
<body>
    <main class="container-fluid">
        <header class="row">
            <nav class="col-md-12">
                <div class="col-md-12 fixed-top fix">
                    <div class="col-md-12 text-center">
                        <img src="image/logo.png" class="logo">
                        <img src="image/tasha.png" class="bannerTasha">
                    </div>
                    <div class="col-md-12 clearfix">
                        <div class="col-md-2 float-right header-login">
                            <img src="image/user.png" class="userIcon">
                            <a href="">Sign in</a> / 
                            <a href="">Sign up</a>
                        </div>
                        <div class="col-md-8 text-center float-right">
                            <form action="">
                                <input type="text" name="search" class="search" placeholder="Search">
                                <button type="submit" class="submit"><img src="image/icons8-search-24.png" ></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="height: 120px;">

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
            <div class="col-md-1 product float-left" ></div>
            <nav class="col-md-3 float-left">
                <div class="card mt-1 mr-5">
                    <div class="card-header p-2">
                        <img src="image/icon/shopping-cart-solid.svg" class="icon">
                        <span>Cart</span>
                    </div>
                    <div class="cart-body product">

                    </div>
                    <div class="card-footer p-2">
                        <img src="image/icon/money-check-alt-solid.svg" class="icon"><span class="ml-1">Total</span>
                    </div>
                </div>
            </nav>
            <article class="col-md-7 float-left">

            </article>
        </div>
        <!-- <footer class="">
            <div> </div>
            <div style="width: 100%; background-color: #1A1A1A; height: 40px;"></div>
        </footer> -->
    </main>
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>