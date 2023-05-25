<?php
require_once("db.php");



$booksing = R::getAll('SELECT `id` FROM `product`  order by `id` DESC limit 1');



if ($_POST["name"] != NULL) {

    $book = R::dispense('product');
    $book->name = $_POST["name"];
    $book->opisanie = $_POST["opis"];
    $book->category = $_POST["categ"];
    $book->price = $_POST["price"];
    $book->img_200x = $booksing[0]['id'];
    $book->img_600x = $booksing[0]['id'];
    R::store($book);
}


$uploaddir = 'assets/img/product/';
$uploadfile = $uploaddir . $booksing[0]['id'] . ".png";

if (move_uploaded_file($_FILES['pic200']['tmp_name'], $uploadfile)) {
}
$uploaddir = 'assets/img/product/600/';
$uploadfile = $uploaddir . $booksing[0]['id'] . ".png";

if (move_uploaded_file($_FILES['pic600']['tmp_name'], $uploadfile)) {
}

$new_url = 'panel/newAdmin.php';
header('Location: ' . $new_url);
