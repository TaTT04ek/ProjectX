<?
require_once __DIR__.'/vendor/autoload.php';
class_alias('\RedBeanPHP\R', '\R');

const HOST = "localhost";
const LOGIN = "u2048736_beton";
const PASS = "u2048736_beton";
const DB = "u2048736_beton";


R::setup('mysql:host='. HOST .'; dbname='.DB .'',LOGIN, PASS, false);

if(!R::testConnection()) die('No DB connection!');


