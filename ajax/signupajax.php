<?php
    require_once '../connect/Database.php';
    $db = new Database();
    if(isset($_POST['username'])):
        $username = $_POST['username'];
        $query = "select username from account where username =:username";
        $param = ['username'=> $username];
        $stmt = $db->queryDataParam($query, $param);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = count($result['username']);
    endif;
