<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config/database.php";
include $_SERVER['DOCUMENT_ROOT'] . "/config/configs.php";
include $_SERVER['DOCUMENT_ROOT'] . "/modules/telegram/send-message.php";
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){

$sql = "SELECT * FROM users WHERE phone LIKE '" . $_POST["phone"] . "'";
$user_id = 0;
$result = mysqli_query($connect, $sql);
if($result->num_rows > 0){
$user = mysqli_fetch_assoc($result);
$user_id = $user["id"];
}else{
	$sql = "INSERT INTO `users` (`login`, `phone`) VALUES ('" . $_POST["username"] . "', '" . $_POST["phone"] . "')";
	if(mysqli_query($connect, $sql)) {
		echo "user added";
		$user_id = $connect->insert_id;
	}else{
	echo "error";	
	}
}	


$sql = "INSERT INTO orders (user_id, products, addres, phone, status) VALUES ('" . $user_id . "','" . $_COOKIE["basket"] . "','" . $_POST["addres"] . "','" . $_POST["phone"] . "','Новый')";
if(mysqli_query($connect, $sql)){
setcookie("basket", "", 0, "/");
echo "Orderd!<br/>
<a href='/'>Главная</a>";
message_to_telegram('Greetings');
}else{
echo "error";	
}
}