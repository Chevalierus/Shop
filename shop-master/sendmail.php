<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config/database.php";

if(isset($_GET["u_code"])) {
	$sql = "SELECT * FROM users WHERE confirm_mail='" . $_GET["u_code"] . "'";
	$result = mysqli_query($connect, $sql);
	if($result->num_rows > 0){
	$user = mysqli_fetch_assoc($result);
	$sql = "UPDATE users SET veryfied = '1' WHERE id=" . $user["id"];
	if(mysqli_query($connect, $sql)){
		echo "Успешно верифицирован";
	}
	}
}

if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
	$u_code = generateRandomString(20);
	$sql = "UPDATE users SET confirm_mail = '$u_code' WHERE mail='" . $_POST["mail"] . "'";
	if(mysqli_query($connect, $sql)){
		$link = "<a href='http://shop-master.local/registration.php?u_code=$u_code'>Confirm</a>";
		mail($_POST["mail"], 'Registration', $link);
	}
}


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Send mail</title>
</head>
<body>
<form method="POST">

<p>Email<br/>
<input type="text" name="mail">
</p>

<button type="submit">Отправить письмо</button>
</form>
</body>
</html>