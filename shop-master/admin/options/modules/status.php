<?php
include $_SERVER['DOCUMENT_ROOT']."/config/database.php";
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
$sql = "UPDATE `orders` SET `status` = '" . $_POST["obj"] . "' WHERE `orders`.`id` = " . $_POST["id"] .  "";

$result = mysqli_query($connect, $sql);


}
?>
