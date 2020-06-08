<?php
    include_once "../connect/Database.php";
    class cart
    {
        private $stmt;
        function addProduct($username_id, $id_product, $quantity) {
            $query = "insert into cart(username_id, id_product, quantity) values ($username_id, $id_product, $quantity);";

        }


    }