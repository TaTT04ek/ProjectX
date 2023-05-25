<?php
require_once("db.php");

if (isset($_POST["product"])){
	$books = R::getAll('SELECT * FROM `product` where  `category` = "'. $_POST["product"].'"');
} else if (isset($_POST["search"])){
	$books = R::getAll("SELECT * FROM `product` where `Name` LIKE  '%".$_POST["search"]."%' ");
}

print_r(json_encode($books));
