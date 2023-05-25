<?php
require_once("db.php");


if (isset($_GET["user_id"])) {
    $books  = R::getAll('SELECT * FROM product
    LEFT JOIN basket ON product.id = basket.product_id
    WHERE `paid` = 0 and basket.user_id = ?', [$_GET["user_id"]]);
    echo json_encode($books);
}
else {
    $books = R::getAll('SELECT * FROM `product` ');

    echo json_encode($books);
}


