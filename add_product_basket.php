<?php
require_once("db.php");

if (isset($_POST["product_id"])) {
    $book = R::dispense('basket');
    $book->user_id = $_POST["user_id"];
    $book->product_id = $_POST["product_id"];
    $book->paid = 0;
    R::store($book);
    print_r('Yes');
} else if (isset($_GET["delete_product_id"])) {
    $book = R::load('basket', $_GET["delete_product_id"]);
    R::trash($book);
} else if (isset($_GET["keys"])) {

    $orders = R::findAll('basket', 'user_id = ? AND paid = ?', [$_GET["keys"], 0]);
    foreach ($orders as $order) {
        $order->paid = 1;
        R::store($order);
    }
    print_r($orders);
} else if (isset($_GET["key"])) {
    $orders = R::findAll('basket', 'user_id = ? AND paid = ?', [$_GET["key"], 1]);
    
    if ($_GET["ids"] ==  1) {
        foreach ($orders as $order) {
            $order->paid = 2;
            R::store($order);
        }
    }
    if ($_GET["ids"] ==  0) {
        foreach ($orders as $order) {
            $order->paid = 3;
            R::store($order);
        }
    }
}
