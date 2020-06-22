<?php
    session_start();
    require_once "../connect/Database.php";
    $db = new Database();


    if(isset($_GET['page'])):
        $newsonepage = 12;
        $page = $_GET['page'];
        settype($page,'int');
        $from = ($page - 1) * $newsonepage;
        $query = "SELECT * FROM product LIMIT $from, $newsonepage";
        $stmt = $db->selectData($query);
    elseif (isset($_GET['category'])):
        unset($_GET['page']);
        $query = "SELECT * FROM product JOIN category ON product.category_id = category.category_id WHERE category.category_id =:category_id";
        $param = [ 'category_id'=> $_GET['category']];
        $stmt = $db->queryDataParam($query, $param);
    elseif (isset($_GET['search'])):
        unset($_GET['page'], $_GET['category']);
        $query = "SELECT * FROM product WHERE name_pro like '%{$_GET['search']}%'";
        $stmt = $db->selectData($query);
    endif;
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)):
?>
        <a href="../public/product.php?id=<?= $result['id_product'] ?>">
            <div class="card float-left ml-2 mt-2 style_prevu_kit size-product" style="width: 190px; height: 285px">
                <img src="../public/image/product/<?= $result['avatar'] ?>" class="card-img-top img-card" height="188px" width="188px">
                <div class="card-body">
                    <h5 class="card-title" style="height: 35px; font-size: 18px"><?= $result['name_pro'] ?></h5>
                    <p class="card-text m-0 mb-1 text-danger"><?= $result['price'] ?>.00$</p>
                </div>
            </div>
        </a>
<?php
    endwhile;
?>
