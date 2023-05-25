<?php
require_once("db.php");

if (isset($_GET["key"])){
    $book = R::load('users', $_GET["key"]);
    R::trash($book);
}
else{
    $books = R::getAll('SELECT * FROM `users` ');
    echo json_encode($books);
}

    



