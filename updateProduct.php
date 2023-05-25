<?php
require_once("db.php");



$booksing = R::getAll('SELECT `id` FROM `product`  order by `id` DESC limit 1');

print_r($_POST);


if ($_POST["id"] != NULL) {
    $book = R::load('product', $_POST["id"]);
    $book->name = $_POST["name"];
    $book->opisanie = $_POST["opis"];
    $book->price = $_POST["price"];
    $book->category = $_POST["categ"];
    $book->img_200x = $_POST["id"];
    $book->img_600x = $_POST["id"];
    R::store($book);
    $uploaddir = 'assets/img/product/';
    $uploadfile = $uploaddir . $_POST["id"] + 1 . ".png";

    if (move_uploaded_file($_FILES['pic200']['tmp_name'], $uploadfile)) {
    }
    $uploaddir = 'assets/img/product/600/';
    $uploadfile = $uploaddir . $_POST["id"] . ".png";

    if (move_uploaded_file($_FILES['pic600']['tmp_name'], $uploadfile)) {
    }

    $new_url = 'panel/newAdmin.php';
    header('Location: ' . $new_url);
}


//21208Ilay