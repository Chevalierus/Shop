<?php 

$server = "localhost";
$username = "root";
$password = "";
$database = "shop";
// подключение к базе данных
$connect = mysqli_connect($server, $username, $password, $database);

mysqli_set_charset($connect, 'UTF8');

?>