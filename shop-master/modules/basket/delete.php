<?php
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
	if(isset($_COOKIE["basket"])){
$basket = json_decode($_COOKIE["basket"], true);
for ($i = 0; $i < count($basket["basket"]); $i++) { 
	if($basket['basket'][$i]['product_id'] == $_POST["id"]){
		unset($basket['basket'][$i]);
		sort($basket["basket"]);
}
}
$jsonProduct = json_encode($basket);
setcookie("basket", "", 0, "/");
setcookie("basket", $jsonProduct, time() + 60*60, "/");
}
}

?>