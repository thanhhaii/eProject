<?php
    require_once '../connect/Database.php';
    $db = new Database();
    if(isset($_GET['id'])):
        $query = "SELECT * FROM category WHERE category_id =:category_id";
        $param = ['category_id'=>$_GET['id']];
        $stmt = $db->queryDataParam($query, $param);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = is_countable($result);
        if($count == 0):
            header('location:product.php');
        endif;
    endif;
    if($_SERVER['REQUEST_METHOD'] === "POST"):
        if(isset($_FILES['image']['name'])):
            move_uploaded_file($_FILES['image']['tmp_name'],'../public/image/category/'.$_FILES['image']['name']);
            $image_category = 'category/'.$_FILES['image']['name'];
        else:
            $image_category = $_POST['old_photo'];
        endif;
        if($_GET['id']):
            $query = "UPDATE category SET name:=name, category_img=:category_img WHERE category_id=:category_id";
            $param = [
                    'name'=>$_POST['name_category'],
                    'category_img' => $image_category,
                    'category_id'  => $_GET['id']
            ];
        else:
            $query = "INSERT INTO category(name, category_img) values(:name, :category_img)";
            $param = [
                'name'=>$_POST['name_category'],
                'category_img' => $image_category
            ];
        endif;
        $stmt = $db->queryDataParam($query, $param);
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
        <h3><?= isset($_GET['id'])?'EDIT CATEGORY':"ADD CATEGORY" ?></h3>
    </div>
    <form method="post" action="#" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name_pro">Name Category</label>
            <input type="text" class="form-control" name="name_category" value="<?= isset($result['name'])?$result['name']:'' ?>" required autocomplete="off">
        </div>
        <img src="<?= isset($result['category_img'])?'../public/image/'.$result['category_img']:'http://placehold.it/100x100' ?>" name="viewAvatar" id="viewAvatar" width="200px">
        <input value="<?= isset($result['category_img']) ?>" name="oldphoto" hidden>
        <div class="form-group">
            <label for="avatar">Category Image</label>
            <input type="file" class="form-control-file" id="avatar" name="image" onchange="changePicture()" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Add</button>
    </form>
</div>
</body>
</html>