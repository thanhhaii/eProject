<?php
    require_once '../connect/Database.php';
    require_once '../Pagination/pagination.php';
    $db = new Database();
//    ----------------QUERY CATEGORY ---------------------
    if(isset($_POST['queryCategory'])):
        if(isset($_POST['search'])):
            $query = "SELECT * FROM category WHERE category_id like '%{$_POST['search']}%' or name like '%{$_POST['search']}%'";
        else:
            $query = "{$_POST['queryCategory']}";
        endif;
    $stmt = $db->selectData($query); ?>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Category ID</th>
            <th scope="col">Name Category</th>
            <th scope="col">Category Image</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody >
        <?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?= $result['category_id']?></td>
                <td><?= $result['name'] ?></td>
                <td><img src="../public/image/<?= $result['category_img'] ?>" width="50px"></td>
                <td>
                    <a href="actionCategory.php?id=<?= $result['category_id'] ?>" class="btn btn-primary">Edit</a>
                    <button class="btn btn-danger">Del</button>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<!--  ----------------QUERY CATEGORY END --------------------- -->
<?php endif;
    if(isset($_POST['queryProduct'])):
        if(isset($_POST['id'])):
            $query = "DELETE FROM image WHERE id_product = {$_POST['id']}";
            $stmt = $db->selectData($query);
            $query = "DELETE FROM product WHERE id_product = {$_POST['id']}";
            $stmt = $db->selectData($query);
        endif;
        if(isset($_POST['search'])):
            $query = "SELECT * FROM product WHERE id_product like '%{$_POST['search']}%' or name_pro like '%{$_POST['search']}%'";
        else:
            $query = "{$_POST['queryProduct']}";
        endif;
    $stmt = $db->selectData($query); ?>
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
                    <a href="../admin/actionProduct.php?id=<?= $result['id_product'] ?>" class="btn btn-primary">Edit</a>
                    <a href="" class="btn btn-danger">Del</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php endif;
    if(isset($_POST['queryImageProduct'])):
        if(isset($_POST['search'])):
            $query = "SELECT DISTINCT(id_product) FROM image WHERE id_product = '{$_POST['search']}'";
        else:
            $query = "{$_POST['queryImageProduct']}";
        endif;
    $stmt = $db->selectData($query); ?>
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">Id Product</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody >
<?php while ($result = $stmt->fetch(PDO::FETCH_ASSOC)):
    $query2 = "select image from image where id_product = {$result['id_product']}";
    $stmt2  = $db->selectData($query2); ?>
            <tr>
                <td><?= $result['id_product']?></td>
                <td>
                <?php while ($result2 = $stmt2->fetch(PDO::FETCH_ASSOC)):?>
                    <img src="../public/image/product/<?= $result2['image'] ?>" width="50px;">
                <?php endwhile; ?>
                </td>
                <td>
                    <a href="" class="btn btn-primary">Edit</a>
                    <a href="" class="btn btn-danger">Del</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php endif; ?>

