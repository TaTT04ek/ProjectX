<?php
require_once("db.php");

if ( isset($_POST["name"])) {
    $book = R::dispense('usersite');
    $book->name = $_POST["name"];
    $book->email = $_POST["email"];
    $book->pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);;
    R::store($book);
    setcookie('login', $_POST["email"], time() + 1209600, '/');
}
else  {
    $user = R::findOne('usersite', 'email = ? ', [$_POST["email"]]);

    if ($user) {
        if (password_verify($_POST["pass"], $user->pass)) {
            setcookie('login', $_POST["email"], time() + 1209600, '/', '', );
        } else {
            return false;
        }
    } else {
        return false;
    }
}


$new_url = '/';
header('Location: '.$new_url);