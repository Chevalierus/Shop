<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config/database.php";
$page = "products";
include $_SERVER['DOCUMENT_ROOT'] . "/admin/siteparts/header.php";
if(isset($_POST["submit"])){

$sql = "INSERT INTO categories (title) VALUES ('" . $_POST["title"] . "')";

if(mysqli_query($connect, $sql)){
	header("Location: /admin/category.php");
}else{
		echo "Введите данные корректно";
}
}
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="/admin/category.php">Categories</a></li>
  </ol>
</nav>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Category</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="text" class="form-control" placeholder="Title">
                            </div>
                        </div>
                    <button name="submit" value="1" type="submit" class="btn btn-success btn-fill pull-right">Add category</button>
                </form>
            </div>
        </div>
    </div>
</div>