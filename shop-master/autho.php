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

$password = md5($_POST["pass"]);
$u_code = generateRandomString(20);

	//login
    $sql = "SELECT * FROM users WHERE login='" . $_POST["username"] . "' AND password='$password' AND veryfied = '1'";
    $result = mysqli_query($connect, $sql);
    if ($result->num_rows > 0) {
    	echo "Найдено";
    }else{
    	echo "Error";
    	header("Location: sendmail.php");
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
	<title>Authorization</title>
</head>
<body>
<form method="POST">
<p>Username<br/>
<input type="text" name="username">
</p>
<p>Password<br/>
<input type="Password" name="pass">
</p>
<button type="submit">Authorization</button>
</form>
</body>
</html>