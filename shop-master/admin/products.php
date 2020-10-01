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
                    Products
                     <a href="options/modules/add.php" type="button" class="btn btn-secondary">Add</a>
                </h4>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Content</th>
                            <th>Category</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM products";
                            $result = mysqli_query($connect, $sql);
                            while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["title"]; ?></td>
                                <td><?php echo $row["descrip"]; ?></td>
                                <td><?php echo $row["content"]; ?></td>
                                <td><?php echo $row["category_id"]; ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <?php
                                        $sql = "SELECT * FROM products WHERE id =" . $row["id"] . "";
                                        $resultat = mysqli_query($connect, $sql);
                                        $id = mysqli_num_rows($resultat);
                                        if($id > 0){
                                        ?>
                                        <a href="options/modules/delete.php?id=<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary">Delete</a>
                                        <a href="options/modules/edit.php?id=<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary">Edit</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
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