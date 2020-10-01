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
//Registration
	$sql = "INSERT INTO users(login, password, mail, confirm_mail) VALUES ('" . $_POST["username"] . "','" . $password . "','" . $_POST["mail"] . "','$u_code')";
	if(mysqli_query($connect, $sql)){
		echo "Успешно";
		$link = "<a href='http://shop-master.local/registration.php?u_code=$u_code'>Confirm</a>";
		mail($_POST["mail"], 'Registration', $link);
		header("Location: index.php");
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
	<title>Registration</title>
</head>
<body>
<form method="POST">
<p>Username<br/>
<input type="text" name="username">
</p>
<p>Email<br/>
<input type="text" name="mail">
</p>
<p>Password<br/>
<input type="Password" name="pass">
</p>
<button type="submit">Registration</button>
</form>
</body>
</html>