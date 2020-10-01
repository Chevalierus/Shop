<?php

include $_SERVER['DOCUMENT_ROOT'] . "/config/database.php";
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
$sql = "SELECT * FROM products WHERE id=" . $_POST["id"];

$result = mysqli_query($connect, $sql);

$product = mysqli_fetch_assoc($result);


if(isset($_COOKIE["basket"])){
$basket = json_decode($_COOKIE["basket"], true);

$issetProduct = 0;

for ($i = 0; $i < count($basket["basket"]); $i++) { 
	if($basket["basket"][$i]["product_id"] == $product["id"]){
		$basket["basket"][$i]["count"]++;
		$issetProduct = 1;
	}
	}

if ($issetProduct != 1) {
	$basket["basket"][] = [
	"product_id" => $product["id"],
	"count" => 1,
	];
}


}else{
	$basket = [ "basket" => [
	["product_id" => $product[ "id" ], 
	"count" => 1,]
	] ];
}

$jsonProduct = json_encode($basket);
setcookie("basket", "", 0, "/");
setcookie("basket", $jsonProduct, time() + 60*60, "/");

echo json_encode([
"count" =>  count($basket["basket"])
]);
}
?>