<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "baza";
$db_table = "category";

$mysqli = mysqli_connect($host,$user,$pass,$db_name);

if ($mysqli->connect_error) {
    die('Ошибка : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$mysqli->set_charset('utf8');
