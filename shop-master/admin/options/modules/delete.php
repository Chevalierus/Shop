<?php

include $_SERVER['DOCUMENT_ROOT']."/config/database.php";

if(isset($_GET["id"])) {

$sql = "DELETE FROM `products` WHERE `products`.`id` =" . $_GET["id"] . "";

if(mysqli_query($connect, $sql)){
	    header("Location /admin/products.php");
}
}

?>