<?php
    include_once '../connect/Database.php';
    $db = new Database();
    if(isset($_POST['query'])):
        $query = "{$_POST['query']}";
        $stmt = $db->selectData($query);
    endif;
    if(isset($_POST['search'])):
        $query = "SELECT * FROM account WHERE (username like '%{$_POST['search']}%' or email like '%{$_POST['search']}%')";
        $stmt = $db->selectData($query);
    endif;
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)):
?>
    <tr>
        <td><?= $result['username_id'] ?></td>
        <td><?= $result['username'] ?></td>
        <td><?= $result['email'] ?></td>
        <td>0<?= $result['phone'] ?></td>
        <td><?= $result['roles'] ?></td>
        <td>
            <a href="" class="btn btn-primary">Edit</a>
            <a href="" class="btn btn-danger">Del</a>
        </td>
    </tr>
<?php endwhile; ?>