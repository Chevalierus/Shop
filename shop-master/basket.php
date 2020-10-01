<?php
include "config/database.php";
include "parts/header.php";

?>
<!-- Отображение товара в корзине-->
<div class="row" id="products">
            <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Count</th>
                <th scope="col">Cost</th>
                <th scope="col">Options</th>
            </tr>
</thead>
<tbody>
            <?php
            if(isset($_COOKIE["basket"])){
            $basket = json_decode($_COOKIE["basket"], true);
            for ($i = 0; $i < count($basket["basket"]); $i++) {
            $sql = "SELECT * FROM products WHERE id=" . $basket["basket"][$i]["product_id"];
            $result = mysqli_query($connect, $sql);
            $product = mysqli_fetch_assoc($result);
            ?>
            <tr>
                <th scope="row"><?php echo $product["id"]?></th>
                <td><?php echo $product["title"]?></td>
                <td><input type="text" name="count" value="<?php echo $basket["basket"][$i]["count"];?>" onchange="countProducts(this, <?php echo $product["id"] ?>, <?php echo $product["cost"] ?>)"></td>
                <td><?php echo $product["cost"] * $basket["basket"][$i]["count"]?></td>
                <td><button onclick="deleteProductBasket(this, <?php echo $product["id"]?>)" class="btn btn-danger">Delete</button></td>
            </tr>
            <?php
            }
            }
            ?>
</tbody>
</table>
</div><!--row-->


<div class="row">
<div class="col-md-8">
<div class="card">
<div class="card-header">
<h4 class="card-title">Add Product</h4>
</div>
<form method="POST" action="/modules/basket/order.php">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Name</label>
                    <input name="username" type="text" class="form-control" placeholder="username">
                </div>
            </div>
            <div class="col-md-12">
                    <div class="form-group">
                    <label>Addres</label>
                    <input name="addres" type="text" class="form-control" placeholder="Addres">
                </div>
            </div>
            <div class="col-md-12">
                    <div class="form-group">
                    <label>Phone</label>
                    <input name="phone" type="text" class="form-control" placeholder="Phone">
                </div>
            </div>
        <button name="submit" value="1" type="submit" class="btn btn-success btn-fill pull-right">Add product</button>
        <div class="clearfix"></div>
</form>
</div>
</div>
</div>
</div>

<?php
include "parts/footer.php";
?>