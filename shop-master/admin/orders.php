<?php
include $_SERVER['DOCUMENT_ROOT']."/config/database.php";
$page = "products";
include $_SERVER['DOCUMENT_ROOT']."/admin/siteparts/header.php";
?>
<div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">
                    Orders
                     <a href="options/modules/add_category.php" type="button" class="btn btn-secondary">Add</a>
                </h4>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>Name</th>
                            <th>Products</th>
                            <th>Addres</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM orders";
                            $result = mysqli_query($connect, $sql);
                            while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["products"]; ?></td>
                                <td><?php echo $row["addres"]; ?></td>
                                <td><?php echo $row["Phone"]; ?></td>
                                <td><?php echo $row["status"]; ?></td>
                                <td>
                                <select class="form-control" name="status" id="status-order" onchange="statusOrder(this, <?php echo $row["id"] ?>)">
                                    <option value="Новый">Новый</option>
                                    <option value="Отправлен">Отправлен</option>
                                </select>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
include "siteparts/footer.php";
?>