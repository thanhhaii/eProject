<?php
    require_once '../connect/Database.php';
    $db = new Database();
    $queryCategory = "SELECT * FROM category";
    $stmt2 = $db->selectData($queryCategory);
    if(isset($_GET['id'])):
        $query = "SELECT * FROM product WHERE id_product =:id_product";
        $param = ['id_product'=>$_GET['id']];
        $stmt = $db->queryDataParam($query, $param);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    endif;
    if($_SERVER['REQUEST_METHOD'] === 'POST'):
        if($_FILES['avatar']['name'] != ''):
            move_uploaded_file($_FILES['avatar']['tmp_name'], "../public/image/product/avatar/".$_FILES['avatar']['name']);
            $photo = 'avatar/'.$_FILES['avatar']['name'];
        else:
            $photo = $_POST['oldphoto'];
        endif;
        if(isset($_GET['id'])):
            $query = "UPDATE product SET name_pro=:name_pro, price=:price, quantity=:quantity, content=:content, status=:status, category_id=:category_id, avatar=:avatar WHERE id_product=:id_product";
            $param =[
                'name_pro'  => $_POST['name_pro'],
                'price'     => $_POST['price'],
                'quantity'  => $_POST['quantity'],
                'content'   => $_POST['content'],
                'status'    => $_POST['show-hide'],
                'category_id' => $_POST['category'],
                'avatar'    => $photo,
                'id_product'=> $_GET['id']
            ];
        else:
            $query = "INSERT INTO product(name_pro, price, quantity, content, status, category_id, avatar) VALUES(:name_pro, :price, :quantity, :content, :status, :category_id, :avatar)";
            $param =[
                'name_pro'  => $_POST['name_pro'],
                'price'     => $_POST['price'],
                'quantity'  => $_POST['quantity'],
                'content'   => $_POST['content'],
                'status'    => $_POST['show-hide'],
                'category_id' => $_POST['category'],
                'avatar'    => $photo
            ];
        endif;
        $db->queryDataParam($query, $param);
        header('location: product.php');
    endif;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EDIT - The Home Store</title>
    <link rel="shortcut icon" type="image/png" href="../public/image/logo.png"/>
    <link rel="stylesheet" href='../public/bootstrap/css/bootstrap.min.css'/>
    <script src="../public/bootstrap/js/jquery-3.5.0.min.js"></script>
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/edit.js"></script>
</head>
<body>
    <div class="container">
        <div class="row d-inline" align="center">
            <a href="product.php" class="btn btn-primary mt-2 ml-3 mb-2">Back</a>
            <h3><?= isset($_GET['id'])?'EDIT PRODUCT':"ADD PRODUCT" ?></h3>
        </div>
        <form method="post" action="#" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name_pro">Name Product</label>
                <input type="text" class="form-control" id="name_pro" name="name_pro" value="<?= isset($result['name_pro'])?$result['name_pro']:'' ?>" required autocomplete="off">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" id="price" value="<?= isset($result['price'])?$result['price']:'' ?>" required autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" value="<?= isset($result['quantity'])?$result['quantity']:'' ?>" required autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="3" required><?= isset($result['content'])?$result['content']:'' ?></textarea>
            </div>
            <label class="my-1 mr-2" for="category">Category</label>
            <select class="custom-select my-1 mr-sm-2" id="category" name="category">
            <?php while ($result2 = $stmt2->fetch(PDO::FETCH_ASSOC)): ?>
                <option value="<?= $result2['category_id'] ?>" <?= isset($result['category_id']) == $result2['category_id'] ?'selected':'' ?>><?= $result2['name'] ?></option>
            <?php endwhile; ?>    
            </select>
            <div class="form-check mt-2">
                <input class="form-check-input" type="radio" name="show-hide" id="show" value="1" <?= isset($result['status'])?'checked':'' ?> required>
                <label class="form-check-label" for="show">
                    Show product
                </label>
            </div>
            <div class="form-check mt-2">
                <input class="form-check-input" type="radio" name="show-hide" id="hide" value="0" <?= isset($_GET['id'])?isset($result['status'])?'':'checked' : '' ?> required>
                <label class="form-check-label" for="hide">
                    Hidden product
                </label>
            </div>
            <img src="<?= isset($result['avatar'])?'../public/image/product/'.$result['avatar']:'http://placehold.it/100x100' ?>" name="viewAvatar" id="viewAvatar" width="200px">
            <input value="<?= isset($result['avatar']) ?>" name="oldphoto" hidden>
            <div class="form-group">
                <label for="avatar">Avatar Product</label>
                <input type="file" class="form-control-file" id="avatar" name="avatar" onchange="changePicture()" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</body>
</html>