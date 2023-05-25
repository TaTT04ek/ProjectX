<?php
require_once("db.php");

    $books = R::getAll('SELECT
    usersite.id,
    `email`,
    product.name,
    `price`,
    `img_200x`
    
    FROM `usersite` 
    LEFT JOIN `basket` on usersite.id = basket.user_id 
    LEFT JOIN `product` on product.id = basket.product_id 
    where basket.paid = 1');

    echo json_encode($books);



