<?php
require_once("db.php");

if ($_POST["email"] != NULL) {
    $book = R::dispense('users');
    $book->name = $_POST["name"];
    $book->email = $_POST["email"];
    $book->phone = $_POST["phone"];
    $book->text = $_POST["text"];
    R::store($book);
}
else if ($_POST["sub"] != NULL) {
    $book = R::dispense('sub');
    $book->email = $_POST["sub"];
    R::store($book);
}