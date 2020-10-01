<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config/database.php";
$page = "products";
include $_SERVER['DOCUMENT_ROOT'] . "/admin/siteparts/header.php";

if(isset($_POST["submit"])){
$sql = "INSERT INTO `products` (`title`, `descrip`, `content`, `category_id`) VALUES ('" . $_POST["title"] . "','" . $_POST["descrip"] . "','" . $_POST["content"] . "','" . $_POST["cat_id"] . "')";

if(mysqli_query($connect, $sql)) {
	echo "Товар добавлен";
    header("Location: /admin/products.php");
}else{
	echo "Введите данные корректно";
}
}
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="/admin/products.php">Products</a></li>
  </ol>
</nav>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Product</h4>
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
                        <div class="col-md-12">
                                <div class="form-group">
                                <label>Description</label>
                                <input name="descrip" type="text" class="form-control" placeholder="Description">
                            </div>
                        </div>
                        <div class="col-md-12">
                                <div class="form-group">
                                <label>Content</label>
                                <input name="content" type="text" class="form-control" placeholder="Content">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="cat_id">
                                    <option value="0">Не выбрано</option>
                                    <?php
                                        $sql = "SELECT * FROM categories";
                                        $result = mysqli_query($connect, $sql);
                                        while ($row = mysqli_fetch_assoc($result)) { 
                                            echo "<option value='" . $row["id"] . "'>" . $row["title"] . "</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button name="submit" value="1" type="submit" class="btn btn-success btn-fill pull-right">Add product</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
