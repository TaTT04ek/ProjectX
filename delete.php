<?php
require_once("db.php");

if ($_POST["id"] != NULL) {
    $book = R::load('users', $_POST["id"]);
    R::trash($book);
    print_r("Удалено");
} else if ($_POST["sub"] != NULL) {
    $book = R::dispense('sub');
    $book->email = $_POST["sub"];
    $book->sub = 1;
    R::store($book);
} else if ($_POST["email"] != NULL) {
    $book = R::dispense('users');
    $book->name = $_POST["name"];
    $book->email = $_POST["email"];
    $book->phone = $_POST["phone"];
    $book->text = $_POST["text"];
    R::store($book);
}
